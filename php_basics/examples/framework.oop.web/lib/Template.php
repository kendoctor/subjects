<?php
/**
 * Created by PhpStorm.
 * User: kendoctor
 * Date: 17/11/17
 * Time: 下午2:18
 */

class Template {

    public static function render($template, $variables = [])
    {
        $filename = __DIR__."/../pages/".$template.".php";

        if(!file_exists($filename))
        {
            return new Response("Exception internal");
        }

        ob_start();
        extract($variables);

        include($filename);

        $content = ob_get_clean();
        return new Response($content);
    }
}