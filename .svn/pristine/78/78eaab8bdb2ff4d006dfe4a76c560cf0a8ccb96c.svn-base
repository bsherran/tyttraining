<?php

//administrador
class AprendizController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("entities")}Aprendiz.php";
        require "{$this->config->get("models")}AprendizModel.php";
    }
    public function index() {
        
    }
    public function buscarAprendiz() {        
        $strquery = @$_REQUEST["keyword"];
        $mAprendiz = new AprendizModel();
        $r = $mAprendiz->getByKeywordApr($strquery);
        echo json_encode($r);        
    }
    
    public function insert() {
        $entity = new Aprendiz();
        $model = new AprendizModel();
        $r = $model->insert($entity);
        print_r($r);
    }
}