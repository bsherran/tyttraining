<?php
class SPDO extends PDO{
    private static $instance = null;
    private function SPDO(){
        
        $config = Config::singleton();
        
        try {
        parent::__construct("mysql:host=".$config->get("dbhost").";dbname=".$config->get("dbname"),$config->get("dbuser"),$config->get("dbpass"));
        $this->exec("SET names utf8");
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
        
        } catch (PDOException $ex) {
            die("error ".$ex->getMessage());
 
        }        
    }
    public static function singleton(){
        if(!isset(self::$instance)){
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }
    public function __clone() {
        trigger_error("no es permitida la clonacion ".E_USER_NOTICE);
    }
}