<?php

//administrador
class AprendizController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("entities")}Aprendiz.php";
        require "{$this->config->get("models")}UsuarioModel.php";
        require "{$this->config->get("models")}AprendizModel.php";
    }

    public function index() {
        $this->viewIndex();
    }

    public function consultarIdentificacion() {
        $aprendiz = new Aprendiz();
        $aprendiz->unserialize($_REQUEST["aprendiz"]);
        $m = new AprendizModel();
        $r = $m->consultarIdentificacion($aprendiz);

        echo json_encode($r);
    }

    public function buscarAprendiz() {
       
       $query["keyword"] = @$_REQUEST['keyword'];
       $m = new AprendizModel();
       $r = $m->getByKeyword($query);
       
       print_r($r);
   }
    

}
