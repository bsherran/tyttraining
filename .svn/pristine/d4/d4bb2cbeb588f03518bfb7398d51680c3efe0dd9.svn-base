<?php

class ProxyAprendiz {

    private static $auth = null;

    static function getAuth() {
        return self::$auth;
    }

    private static function validateAuth() {
        if (!isset($_SESSION["Aprendiz"])) {
            header("location:../../?a=index&status=500&msg=Usuario no permitido");
        } else {
            self::$auth = json_decode($_SESSION["Aprendiz"]);
        }
    }

    public static function main() {
        //desabilitados para que no pida sesion.
        self::validateAuth();
        //Dependencias de configuraci{on
        require_once "../../appserver/class_/Config.php";
        require_once "../../appserver/class_/Paginacion.php";
        require_once "../../configuraciones.php";

        //Dependencias de conexion y arquitectura del sistema
        require_once "{$config->get('models')}IModel.php";
        require_once "{$config->get('models')}SPDO.php";
        require_once "{$config->get('controllers')}IController.php";
        require_once "{$config->get('views')}View.php";
       

        //Validacion del controlador inicial        
        if (isset($_REQUEST["c"])) {
            $clscontroller = "{$_REQUEST["c"]}Controller";
        } else {
            $clscontroller = "IndexController";
        }

        //Validacion de la accion inicial
        $action = "";
        if (isset($_REQUEST["a"])) {
            $action = "{$_REQUEST["a"]}";
        } else {
            $action = "index";
        }

        //Validacion de la clase
        $path_controller = "{$config->get("controllers")}aprendiz/{$clscontroller}.php";
        if (is_file($path_controller)) {
            require_once $path_controller;
            if (is_callable($clscontroller, $action)) {
                $controller = new $clscontroller();
                if ($controller instanceof IController) {
                    $controller->$action();
                } else {
                    die("No se ha implementado IController en '{$clscontroller}. ");
                }
            } else {
                die("El controlador {$clscontroller} -> {$action}().");
            }
        } else {
            die("El controlador '{$clscontroller}' no existe para la vista publica.");
        }
    }

}