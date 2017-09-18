
<?php

//administrador
class IndexController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("models")}UsuarioModel.php";
        require "{$this->config->get("models")}AreaModel.php";
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("models")}NivelModel.php";
        require "{$this->config->get("entities")}Nivel.php";
    }

    public function index() {
        $this->viewPanel();
        //$this->viewGestlistar();
    }

    //vista inicial del administrador una vez logueado.
    public function viewPanel() {
        $entity = new Area();
        $mArea = new AreaModel();
        $r = $mArea->get($entity);
        $vars["data"] = $r->data;
        $pathview = $this->subviewpath . "index.php";
        $this->view->show($pathview, $vars);
    }
//     public function viewGestlistar() {
//        $entity = new Nivel();
//        $mNivel = new NivelModel();
//        $r = $mNivel->get($entity);
//        $vars["data"] = $r->data;
//        $pathview = $this->subviewpath . "index.php";
//        $this->view->show($pathview, $vars);
//    }
     

    public function sesionclose() {
        session_start();
        session_destroy();
        header("location: ../../");
    }
    
   
}
