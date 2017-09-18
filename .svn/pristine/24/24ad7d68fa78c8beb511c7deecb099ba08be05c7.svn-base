<?php

class IndexController implements IController {

    private $view;
    private $path = "public/";
    private $pathAdmin = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("entities")}Administrador.php";
        require "{$this->config->get("entities")}SuperAdministrador.php";
        require "{$this->config->get("entities")}Aprendiz.php";
        require "{$this->config->get("models")}UsuarioModel.php";
        require "{$this->config->get("models")}AdministradorModel.php";
        require "{$this->config->get("models")}SuperAdministradorModel.php";
        require "{$this->config->get("models")}AprendizModel.php";
    }

    public function index() {
        $vars = [];
        $vars["msg"] = @$_REQUEST["msg"];
        $vars["status"] = @$_REQUEST["status"];
        $this->view->show("{$this->path}index.php", $vars);
    }

    //Metodo para iniciar sesion.
//    public function login() {
//        $r = new stdClass();
//        if (isset($_REQUEST["usuLogin"]) && isset($_REQUEST["usuPassword"])) {
//            $usuario = new Usuario();
//            $usuario->setUsuLogin($_REQUEST["usuLogin"]);
//            $usuario->setUsuPassword($_REQUEST["usuPassword"]);
//            $ma = new AdministradorModel();
//            $r = $ma->authUser($usuario);
//            if ($r->status !== 200) {
//                $ms = new SuperAdministradorModel();
//                $r = $ms->authUser($usuario);
//            }
//            if ($r->status !== 200) {
//                $ma = new AprendizModel();
//                $r = $ma->authUser($usuario);
//            }
//        } else {
//            $r->status = 500;
//            $r->msg = "Se requieren parametros!";
//        }
//        if ($r->status === 200) {
//            $_SESSION["{$r->data->getRol()}"] = json_encode($r->data);
//            header("location: private/{$r->data->getRol()}");
//        } else {
//            header("location:?msg={$r->msg}");
//        }
//    }
    public function login() {
        $r = new stdClass();
        if (isset($_REQUEST["usuLogin"]) && isset($_REQUEST["usuPassword"])) {
            $usuario = new Usuario();
            $usuario->setUsuLogin($_REQUEST["usuLogin"]);
            $usuario->setUsuPassword($_REQUEST["usuPassword"]);
            $ma = new SuperAdministradorModel();
            $r = $ma->authUser($usuario);            
            if ($r->status !== 200) {
                $ma = new AprendizModel();
                $r = $ma->authUser($usuario);
            }
        } else {
            $r->status = 500;
            $r->msg = "Se requieren parametros!";
        }
        if ($r->status === 200) {
            $_SESSION["{$r->data->getRol()}"] = json_encode($r->data);
            header("location: private/{$r->data->getRol()}");
        } else {
            header("location:?msg={$r->msg}");
        }
    }

    public function viewQuienesSomos() {
        $this->view->show("{$this->path}quienesSomos.php");
    }

    public function viewConsultarIdentificacion() {
        $this->view->show("{$this->path}consultarIdentificacion.php");
    }

}
