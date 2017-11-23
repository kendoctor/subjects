<?php


/**
 * Application for running a web app
 */
class Application {

    /**
     * Routes collection
     *     
     * @var array
     */
    private $routes;

    /**
     * Current Request
     * 
     * @var Request
     */
    private $request;

    /**
     * Load routes for applicaton
     * 
     * @param  array $routes 
     * @return [type]         
     */
    public function load(array $routes)
    {
        $this->routes = $routes;
    }


    /**
     * Match the request uri if there's a route 
     * 
     * @return [Route]  Matched route if found, otherwise null
     */
    protected function doMatch()
    {
        $path = $this->request->getPathInfo();

        foreach ($this->routes as $route) {
            $arguments = [];

            if(preg_match_all("$\{([a-zA-Z_-]+)\}$", $route->getPath(), $matches))
            {
                foreach($matches[1] as $argument_name)
                {
                    $arguments[$argument_name] = "";
                }
            }

            $pathToMatch = preg_replace("$(\\{[a-zA-Z_-]+\\})$","([^/]+)", $route->getPath());
            $pathToMatch = preg_replace("/(\/)/", "\/", $pathToMatch);


            if(preg_match("/^".$pathToMatch."$/", $path , $matches))
            {
                if(count($arguments) !== count($matches) -1 )
                {
                    throw new \Exception(sprintf("Route arguments not matched."));
                }

                $index = 0;
                foreach($arguments as $name => $value)
                {
                    $arguments[$name] = $matches[$index+1];
                    $index++;
                }

                $this->request->addAttributes($arguments);

                return $route;
            }
        }

        return null;
    }

    /**
     * Run application
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function run(Request $request)
    {
        $this->request = $request;

        /*
         * 1. do match for routes
         *    * if not any route matched, create a `Page Not found` Response
         * 2. invoke callback of the matched route
         *
         * 3. get callback's return value for response
         */

        if (!($route = $this->doMatch())) {
            return new Response("Page not Found");
        }

        $controller = $this->resolveController($route->getCallback());

        $result = call_user_func_array($controller, array($this->request));

        if(is_string($result))
            return new Response($result);

        if (!$result instanceof Response) {
            return new Response("Exception occurred.");
        }

        return $result;
    }

    /**
     * Resolve callback to a callable, for examples
     * 1. "index"
     * 2. "Home::index"
     * 3. Anonymous function
     * 
     * @param  [type] $callback [description]
     * @return [type]           [description]
     */
    protected function resolveController($callback)
    {

        if(is_string($callback))
        {
            if (preg_match("/(([\\a-z_A-Z]+)::([a-z_A-Z]+))|([a-z_A-Z]+)/", $callback, $matches)) {
                if(count($matches) === 5)
                {
                    return $matches[4];
                }

                $class = $matches[2]."Controller";

                $obj = new $class;

                return array($obj, $matches[3]);
            }
        }

        if(is_callable($callback))
            return $callback;

    }
}