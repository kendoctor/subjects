<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午1:08
 */

class Response {
    private $content;

    public function __construct($content = "")
    {
        $this->content = $content;
    }

    public function send()
    {
        echo $this->content;
    }
}