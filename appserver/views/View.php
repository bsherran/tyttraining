<?php
class View{
    public static function show($viewName,$vars = []){
        $config = Config::singleton();
        extract($vars);
        include "{$config->get("views")}{$viewName}";
    }
}