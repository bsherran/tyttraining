<?php

class PreguntaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Leccion.php";
        require "{$this->config->get("entities")}Pregunta.php";
        require "{$this->config->get("entities")}OpcionRespuesta.php";
        require "{$this->config->get("models")}LeccionModel.php";
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

    public function registrar() {
        $ma = new LeccionModel();
        $entity = new Leccion();
        $entity->setLecId($_REQUEST["lecId"]);
        $r = $ma->getById($entity);
        $vars = [];
        $vars["leccion"] = $r->data;
        $pathview = $this->subviewpath . "gestionar/gestionarPreguntaRegistrar.php";
        $this->view->show($pathview, $vars);
    }

    public function insert() {
        //echo "<pre>";
        //print_r($_REQUEST);
        //die();
        extract($_REQUEST);
        $entity = new Pregunta();
        $entity->setPreNombre($preNombre);
        $entity->setPreTipoPregunta($preTipoPregunta);
        $entity->setLecId($lecId);
        $model = new PreguntaModel();
        $r = $model->insert($entity);
        /** Opciones de respuesta * */
        $mor = new OpcionRespuestaModel();
        $cantidad = count($opcion);
        for ($i = 0; $i < $cantidad; $i++) {
            $opres = new OpcionRespuesta();
            $opres->setOpcArchivo("--");
            $opres->setOpcTipoRespuesta("--");
            $opres->setOpcTexto($opcion[$i]);
            $vf = 0;
            if (is_array($esRespuesta)) {
                if (isset($esRespuesta[$i])) {
                    $vf = 1;
                }
            } else {
                if (intval($i) === intval($esRespuesta)) {
                    $vf = 1;
                }
            }
            $opres->setOpcVerdadero($vf);
            $opres->setPreId($r->data->getPreId());
            //echo "<pre>";
            //print_r($opres);
            $ro = $mor->insert($opres);
        }
        header("location:?c=Pregunta&a=listar&lecId={$lecId}");
    }

    public function delete() {
        $entity = new Pregunta();
        $id = $_REQUEST["lecId"];
        $entity->setPreId($id);
        //***
        $m = new PreguntaModel();
        $r = $m->delete($entity);
        print_r($r);
        header("location:?c=Pregunta&a=listar&lecId={$_REQUEST["lecId"]}");
    }

    public function frmEditar() {
        $entity = new Pregunta();
        $id = ($_REQUEST["preId"]);
        $entity->setPreId($id);
        $entity->setLecId($lecId);
        $m = new PreguntaModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/gestionar/gestionarPreguntaEditar.php", $vars);
        } else {
            header("location:?c=Pregunta&a=listar&lecId={$lecId}");
        }
    }

    public function editar() {
        $r = null;
        if (isset($_POST["preNombre"])) {
            $entity = new Pregunta();
            $entity->setPreId($_REQUEST["preId"]);
            $entity->setPreNombre($_REQUEST["preNombre"]);
            $entity->setPreTipoPregunta($_REQUEST["preTipoPregunta"]);
            $entity->setLecId($areaId);
            $m = new PreguntaModel();
            $r = $m->update($entity);
        } else {
            $r = new stdClass();
            $r->status = 501;
            $r->msg = "";
        }
        header("location:?c=Pregunta&a=listar&lecId={$lecId}");
    }

}
