<?php
class Config{
    private $vars;
    private static $instance = null;
    
    public function __construct() {
        $this->vars = array();
    }
    public static function singleton(){
        if(self::$instance === null){
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }
    public function set($key,$value){
        $this->vars["{$key}"] = $value;
    }
    public function get($key){
        return $this->vars["{$key}"];
    }
}

