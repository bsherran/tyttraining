<?php

class RespuestaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Respuesta.php";
        require "{$this->config->get("models")}RespuestaModel.php";
    }

    public function index() {
        
    }

    public function insert() {
        extract($_REQUEST);
        $model = new RespuestaModel();
        if (!is_array($opcion)) {
            $entity = new Respuesta();
            $entity->setOpcId($opcion);
            $entity->setAprId(ProxyAprendiz::getAuth()->aprId);
            $entity->setResFecha(date("Y-m-d"));
        } else {
            foreach ($opcion as $opt) {
                $entity = new Respuesta();
                $entity->setOpcId($opt);
                $entity->setAprId(ProxyAprendiz::getAuth()->aprId);
                $entity->setResFecha(date("Y-m-d"));
            }
        }


        $r = $model->insert($entity);

        header("location: ?c=Pregunta&a=listarPreguntabyIdLeccion&idLec={$_REQUEST['lecId']}?msg={$r->msg}#pregunta{$_REQUEST['preId']}");
    }

}
