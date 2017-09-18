<?php

class NivelController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("models")}AreaModel.php";
        require "{$this->config->get("models")}NivelModel.php";
    }

    public function index() {
        
    }

    public function listar() {
        $entity = new Area();
        $nivel = new Nivel();
        $mNivel = new NivelModel();
        $r = null;
        $vars = [];

        if (isset($_REQUEST["areId"])) {
            $vars["areId"] = $_REQUEST["areId"];
            $r = $mNivel->getByAreaId($_REQUEST["areId"]);
            $ma = new AreaModel();
            $entity->setAreId($_REQUEST["areId"]);
            $ra = $ma->getById($entity);
            $entity = $ra->data;
        } else {
            $r = $mNivel->get($nivel);
        }
        $vars["area"] = $entity;
        $vars["data"] = $r->data;
        $pathview = $this->subviewpath . "index.php";
        $this->view->show($pathview, $vars);
    }

    public function listarNivelbyIdArea() {
        $entity = new Area();
        $areId = $_REQUEST["idArea"];
        $ma = new AreaModel();
        $entity->setAreId($_REQUEST["idArea"]);
        $ra = $ma->getById($entity);
        $entity = $ra->data;
        $mNivel = new NivelModel();
        //***********
//        $rc = $mNivel->getCount($areId, @$_REQUEST["termino"]);
//        $paginador = new Paginacion($rc->cantidad);
//        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        //***********
        $r = $mNivel->getPaginacion($areId);
        $vars["area"] = $entity;
        foreach ($r->data as $nivel) {
            $rc = $mNivel->getCantidadRespuestasByNivel($nivel->getNivId());
            $nivel->setCantidadPreguntas($rc->data->cantidad);
            $rr = $mNivel->getCantidadRespuestasByNivelAndAprendiz($nivel->getNivId(), ProxyAprendiz::getAuth()->aprId);
            $nivel->setCantidadRespuestas($rr->data->cantidad);
        }
        //***********
        $vars["data"] = $r->data;       

        $pathview = $this->subviewpath . "nivel.php";
        $this->view->show($pathview, $vars);
        //**
    }

}
