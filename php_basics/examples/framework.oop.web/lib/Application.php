<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午1:08
 */

class Application {
    private $routes;

    /**
     * @var Request
     */
    private $request;

    public function load($routes)
    {
        $this->routes = $routes;
    }

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