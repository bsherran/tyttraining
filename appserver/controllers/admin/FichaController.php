<?php

class FichaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Ficha.php";
        require "{$this->config->get("models")}FichaModel.php";
    }

    public function index() {
        
    }

    public function buscarFicha() {
        $strquery = $_REQUEST["keyword"];
        $mFicha = new FichaModel();
        $r = $mFicha->getByKeyword($strquery);
        echo json_encode($r);
    }

    public function insert() {
        $entity = new Ficha();
        $model = new FichaModel();
        $r = $model->insert($entity);
        print_r($r);
    }

    public function delete() {
        extract($_REQUEST);
        $entity = new Ficha();
        $entity->setFicCodigo($ficCodigo);
        $model = new FichaModel();
        $r = $model->delete($entity);
        $vars["msg"] = $r->data;
        $pathview = $this->subviewpath . "gestionar/gestionarFicha.php";
        $this->view->show($pathview, $vars);
    }

}
