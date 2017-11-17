<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午3:01
 */

class HomeController {

    public function index()
    {
        return Template::render("home");
    }

    public function hello(Request $request)
    {
        return Template::render("hello", [
            "name" => $request->getAttributes()["name"]
        ]);
    }
}