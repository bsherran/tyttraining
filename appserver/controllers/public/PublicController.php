<?php

class PublicController {

  public static function main() {
    //Dependencias de configuraci{on
    require_once "appserver/class_/Config.php";
    require_once "configuraciones.php";

    //Dependencias de conexion y arquitectura del sistema
    require_once "{$config->get('models')}IModel.php";
    require_once "{$config->get('models')}SPDO.php";
    require_once "{$config->get('controllers')}IController.php";
    require_once "{$config->get('views')}View.php";

    //Validacion del controlador inicial
    $clscontroller = "IndexController";
    if (isset($_REQUEST["c"])) {
      $clscontroller = "{$_REQUEST["c"]}Controller";
    }

    //Validacion de la accion inicial
    $action = "index";
    if (isset($_REQUEST["a"])) {
      $action = "{$_REQUEST["a"]}";
    }

    //Validacion de la clase
    $path_controller = "{$config->get("controllers")}public/{$clscontroller}.php";
    if (is_file($path_controller)) {
      require_once $path_controller;
      $controller = new $clscontroller();
      if ($controller instanceof IController) {
        if (is_callable(array($controller, $action))) {
          $controller->$action();
        } else {
          echo "No se puede ejecutar '{$clscontroller}->{$action}()'. ";
          die();
        }
      } else {
        echo "El controlador '{$clscontroller}' no implementa la interface IController. ";
        die();
      }
    } else {
      echo "El controlador '{$clscontroller}' no existe para la vista publica.";
      die();
    }
  }
}
?>