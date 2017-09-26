<?php

class ProgramaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Programa.php";
        require "{$this->config->get("models")}ProgramaModel.php";
    }

    public function index() {
        
    }

    public function buscarPrograma() {
        $strquery = @$_REQUEST["keyword"];
        $mPrograma = new ProgramaModel();
        $r = $mPrograma->getByKeywordPro($strquery);
        echo json_encode($r);
    }
    public function buscarPrograma1() {
        $strquery = @$_REQUEST["keyword"];
        $mPrograma = new ProgramaModel();
        $r = $mPrograma->getByKeywordPro1($strquery);
        echo json_encode($r);
    }
    
    public function insert() {
        $entity = new Programa();
        $model = new ProgramaModel();
        $r = $model->insert($entity);
        print_r($r);
        
    }

}
