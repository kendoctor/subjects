<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午1:08
 */

class Request {

    private $attributes;

    public function __construct()
    {
        $this->attributes = [];
    }

    public function addAttributes($attributes)
    {
        foreach($attributes as $key=>$value)
        {
            $this->attributes[$key] = $value;
        }
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public static function createFromSuperGlobals()
    {
        return new self();
    }


    public function getPathInfo()
    {
        $request_uri = $_SERVER["REQUEST_URI"];
        $script_name = $_SERVER["SCRIPT_NAME"];

        $path = str_replace($script_name, "", $request_uri);

        return empty($path) ? "/" : $path;
    }
}