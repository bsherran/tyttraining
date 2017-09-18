

<?php

class AreaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("models")}AreaModel.php";
    }

    public function index() {
        header("location:c=Area&a=listar");
    }

    public function listar() {
        $entity = new Area();
        $mArea = new AreaModel();
        $r = $mArea->get($entity);
        $vars["data"] = $r->data;
        
        $pathview = $this->subviewpath . "index.php";
        $this->view->show($pathview, $vars);
    }

   
}