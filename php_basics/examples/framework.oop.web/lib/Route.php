<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午1:09
 */

class Route {
    private $name;
    private $path;
    private $callback;
    private $methods;

    public function __construct($path, $callback)
    {
        $this->path = $path;
        $this->callback = $callback;

        //default method `GET`
        $this->methods[] = "GET";
    }

    public function setMethod($method)
    {
        $this->methods = [$method];
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getCallback()
    {
        return $this->callback;
    }


}