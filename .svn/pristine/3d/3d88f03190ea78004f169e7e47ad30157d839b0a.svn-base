<?php

class PreguntaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Leccion.php";
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("entities")}Pregunta.php";
        require "{$this->config->get("entities")}OpcionRespuesta.php";
        require "{$this->config->get("models")}NivelModel.php";
        require "{$this->config->get("models")}LeccionModel.php";
        require "{$this->config->get("models")}AreaModel.php";
        require "{$this->config->get("models")}PreguntaModel.php";
        require "{$this->config->get("models")}OpcionRespuestaModel.php";
    }

    public function index() {
        
    }

    public function listar() {
        $entity = new Leccion();
        $pregunta = new Pregunta();
        $mPregunta = new PreguntaModel();
        $r = null;
        $vars = [];
        if (isset($_REQUEST["lecId"])) {
            $vars["lecId"] = $_REQUEST["lecId"];
            $r = $mPregunta->getByLeccionId($_REQUEST["lecId"]);
            $ma = new LeccionModel();
            $entity->setLecId($_REQUEST["lecId"]);
            $ra = $ma->getById($entity);
            $entity = $ra->data;
        } else {
            $r = $mPregunta->get($pregunta);
        }
        $vars["leccion"] = $entity;
        /*         * ** */
        $mop = new OpcionRespuestaModel();
        foreach ($r->data as $pregunta) {
            $rop = $mop->getByPreguntaId($pregunta->getPreId());
            $pregunta->setOpciones($rop->data);
        }
        $vars["data"] = $r->data;
        $pathview = $this->subviewpath . "gestionar/gestionarPreguntaListar.php";
        $this->view->show($pathview, $vars);
    }

    public function listarPreguntabyIdLeccion() {
        $leccion = new Leccion();
        $lecId = $_REQUEST["idLec"];
        $leccion->setLecId($lecId);
        $mLeccion = new LeccionModel();
        $rl = $mLeccion->getById($leccion);
        /*         * ** */
        $nivel = new Nivel();
        $nivel->setNivId($rl->data->getNivId());
        $mNivel = new NIvelModel();
        $rn = $mNivel->getById($nivel);
        /*         * ** */
        $area = new Area();
        $area->setAreId($rn->data->getAreId());
        $mArea = new AreaModel();
        $ra = $mArea->getById($area);
        /*         * **** */
        $mPregunta = new PreguntaModel();
        $rc = $mPregunta->getCount($lecId, @$_REQUEST["termino"]);
        $paginador = new Paginacion($rc->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        //***********
        $rp = $mPregunta->getPaginacion($lecId, @$_REQUEST["termino"], $paginador);
//        $rp = $mPregunta->getByLeccionId($lecId);
        /*         * **** */
        $mop = new OpcionRespuestaModel();
        foreach ($rp->data as $pregunta) {
            $rop = $mop->getByPreguntaId($pregunta->getPreId());
            $pregunta->setOpciones($rop->data);
        }
        /*         * **** */
        $vars["area"] = $ra->data;
        $vars["nivel"] = $rn->data;
        $vars["leccion"] = $rl->data;
        $vars["preguntas"] = $rp->data;
        $vars["paginador"] = $paginador;
//        echo "<pre>";
//        print_r($vars);
//        die;
        $pathview = $this->subviewpath . "pregunta.php";
        $this->view->show($pathview, $vars);
    }

    public function listarPreguntabyIdLeccion1() {
        $leccion = new Leccion();
        $lecId = $_REQUEST["idLec"];
        $leccion->setLecId($lecId);
        $mLeccion = new LeccionModel();
        $rl = $mLeccion->getById($leccion);
        /*         * ** */
        $nivel = new Nivel();
        $nivel->setNivId($rl->data->getNivId());
        $mNivel = new NIvelModel();
        $rn = $mNivel->getById($nivel);
        /*         * ** */
        $area = new Area();
        $area->setAreId($rn->data->getAreId());
        $mArea = new AreaModel();
        $ra = $mArea->getById($area);
        /*         * **** */
        $mPregunta = new PreguntaModel();
        $rp = $mPregunta->getByLeccionId($lecId);
        /*         * **** */
        $mPregunta = new PreguntaModel();
        $rp = $mPregunta->getPregunta($lecId);
        /***/
        $mop = new OpcionRespuestaModel();
        foreach ($rp->data as $pregunta) {
            $rop = $mop->getByPreguntaId($pregunta->getPreId());
            $pregunta->setOpciones($rop->data);
        }
        /*         * **** */
        $vars["area"] = $ra->data;
        $vars["nivel"] = $rn->data;
        $vars["leccion"] = $rl->data;
        $vars["preguntas"] = $rp->data;
//        echo "<pre>";
//        print_r($vars);
//        die;
        $pathview = $this->subviewpath . "pregunta.php";
        $this->view->show($pathview, $vars);
    }
   
}
