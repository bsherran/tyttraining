<?php

class ServiciosProxy {
    public static function main() {
        //  self::validateAuth();
        //Se incluye clases generales o dependencias
        require_once '../../appserver/class_/Config.php';
        require_once '../../configuraciones.php';
        //$c = Config::singleton();
        require_once "{$config->get("controllers")}IController.php";
        require_once "{$config->get("models")}IModel.php";
        require_once "{$config->get("views")}View.php";
        require_once "{$config->get("models")}SPDO.php";

        //Validacion del controlador
        $controlName = "";
        if (isset($_REQUEST["c"])) {
            $controlName = "{$_REQUEST["c"]}Controller";
        } else {
            $controlName = "ServiciosWebController";
        }
        //Validacion de la accion
        $actionName = "";
        if (isset($_REQUEST["a"])) {
            $actionName = $_REQUEST["a"];
        } else {
            $actionName = "index";
        }
        //Creamos el path de la clase 
        $path = "{$config->get("controllers")}servicios/{$controlName}.php";
        if (is_file($path)) {
            require_once $path;
            if (is_callable([$controlName, $actionName])) {
                $controller = new $controlName();
                if ($controller instanceof IController) {
                    $controller->$actionName();
                } else {
                    die("No se ha implementado IController en {$controlName}.");
                }
            } else {
                die("No se puede invocar {$controlName}->{$actionName}().");
            }
        } else {
            die("El controlador {$controlName} no existe!");
        }
    }

}
