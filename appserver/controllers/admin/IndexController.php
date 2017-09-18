<?php

//administrador
class IndexController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("models")}UsuarioModel.php";
    }

    public function index() {
        $this->viewPanel();
    }

    //vista inicial del administrador una vez logueado.
    public function viewPanel() {
        $pathview = $this->subviewpath . "index.php";
        $this->view->show($pathview);
    }

    public function viewGestAprendiz() {
        $pathview = $this->subviewpath . "gestionar/gestionarAprendiz.php";
        $this->view->show($pathview);
    }

    public function viewGestArea() {
        $pathview = $this->subviewpath . "gestionar/gestionarArea.php";
        $this->view->show($pathview);
    }

    public function viewGestPrograma() {
        $pathview = $this->subviewpath . "gestionar/gestionarPrograma.php";
        $this->view->show($pathview);
    }

    public function viewGestFichas() {
        $pathview = $this->subviewpath . "gestionar/gestionarFicha.php";
        $this->view->show($pathview);
    }
    

    public function RegistrarSupAdmin() {
        $pathview = $this->subviewpath . "RegistrarSupAdmin.php";
        $this->view->show($pathview);
    }
    public function RegistrarAdmin() {
        $pathview = $this->subviewpath . "RegistrarAdmin.php";
        $this->view->show($pathview);
    }

    public function editarPerfil() {
        $pathview = $this->subviewpath . "perfilAdmin.php";
        $this->view->show($pathview);
    }

    public function sesionclose() {
        session_start();
        session_destroy();
        header("location: ../../");
    }
}
