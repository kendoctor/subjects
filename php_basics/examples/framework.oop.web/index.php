<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午1:05
 */

error_reporting(E_ALL);

define("LIB_DIR", __DIR__."/lib");
define("CTRL_DIR", __DIR__."/controllers");

function __autoload($class)
{
    $class_filename = sprintf("%s/%s.php", LIB_DIR, $class);

    if(!file_exists($class_filename))
    {
        $class_filename = sprintf("%s/%s.php", CTRL_DIR, $class);
    }

    if(!file_exists($class_filename))
    {
        die("class $class not found");
    }

    include_once($class_filename);
}

$routes = [
    new Route("/", "Home::index"),
    new Route("/hello/{name}", "Home::hello"),
];

$app = new Application();

$app->load($routes);

$response = $app->run(Request::createFromSuperGlobals());

$response->send();

