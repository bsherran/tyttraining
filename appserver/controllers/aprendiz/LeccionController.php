<?php

class LeccionController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Leccion.php";
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("models")}NivelModel.php";
        require "{$this->config->get("models")}LeccionModel.php";
        require "{$this->config->get("models")}AreaModel.php";
    }

    public function index() {
        
    }

    public function listar() {
        $entity = new Nivel();
        $leccion = new Leccion();
        $mLeccion = new LeccionModel();
        $r = null;
        $vars = [];
        if (isset($_REQUEST["nivId"])) {
            $vars["nivId"] = $_REQUEST["nivId"];
            $r = $mLeccion->getByNivelId($_REQUEST["nivId"]);
            $ma = new NivelModel();
            $entity->setNivId($_REQUEST["nivId"]);
            $ra = $ma->getById($entity);
            $entity = $ra->data;
        } else {
            $r = $mLeccion->get($leccion);
        }
        $vars["nivel"] = $entity;
        $vars["data"] = $r->data;
        $pathview = $this->subviewpath . "index.php";
        $this->view->show($pathview, $vars);
    }

    public function listarLeccionbyIdNivel() {
        $entity = new Nivel();
        $nivId = $_REQUEST ["idNivel"];
        $mn = new NivelModel();
        $entity->setNivId($_REQUEST["idNivel"]);
        $rn = $mn->getById($entity);
        $entity = $rn->data;
        $mLeccion = new LeccionModel();
        //********
//        $rc = $mLeccion->getCount($nivId, @$_REQUEST["termino"]);
//        $paginador = new Paginacion($rc->cantidad);
//        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        //***********
        $r = $mLeccion->getPaginacion($nivId);
        $vars["nivel"] = $entity;
        foreach ($r->data as $leccion) {
            $rc = $mLeccion->getCantidadRespuestasByLeccion($leccion->getLecId());
            $leccion->setCantidadPreguntas($rc->data->cantidad);
            $rr = $mLeccion->getCantidadRespuestasByLeccionAndAprendiz($leccion->getLecId(), ProxyAprendiz::getAuth()->aprId);
            $leccion->setCantidadRespuestas($rr->data->cantidad);
           
        }
// ***
            $vars["data"] = $r->data;
//            $vars["paginador"] = $paginador;

            $pathview = $this->subviewpath . "leccion.php";
            $this->view->show($pathview, $vars);
        }
    }    

