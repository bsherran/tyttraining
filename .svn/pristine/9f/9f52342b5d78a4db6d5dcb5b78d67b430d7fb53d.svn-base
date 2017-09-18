<?php

class LeccionController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("entities")}Leccion.php";
        require "{$this->config->get("models")}NivelModel.php";
        require "{$this->config->get("models")}LeccionModel.php";
    }

    public function index() {
        
    }

    public function PaginacionLeccion() {
        $mLeccion = new LeccionModel();
        $r = $mLeccion->getCount($_REQUEST["nivId"], @$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        /*         * */
        $r = $mLeccion->getPaginacion(@$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
    }
    public function exportarXLS() {
        $mLeccion = new LeccionModel();
        $r = $mLeccion->get(null);
        $html = "<table>";
        $html .= "<tr>";
        $html .= "<td>Id</td>";
        $html .= "<td>Nombre</td>";
        $html .= "<td>Imagen</td>";
        $html .= "</tr>";
        foreach ($r->data as $leccion) {
            $leccion instanceof Leccion;
            $html .= "<tr height='100'>";
            $html .= "<td>{$leccion->getLecId()}</td>";
            $html .= "<td>{$leccion->getLecNombre()}</td>";
            $html .= "<td><img src='{$this->config->get('rassets')}leccion/{$leccion->getLecImagen()}' width='80' heigth='80' /></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ReporteLecciones.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $html;
    }

    public function listar() {
        $entity = new Nivel();
        $vars = [];
        $entity->setNivId($_REQUEST["nivId"]);
        $mNivel = new NivelModel();
        $ra = $mNivel->getById($entity);
        $mLeccion = new LeccionModel();
        $r = $mLeccion->getCount($_REQUEST["nivId"], @$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);

        $r = $mLeccion->getPaginacion($_REQUEST["nivId"], @$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
        $vars["nivel"] = $ra->data;
        $vars["nivId"] = $_REQUEST["nivId"];
        $vars["data"] = $r->data;
        $vars["paginador"] = $paginador;        
        $pathview = $this->subviewpath . "gestionar/gestionarLeccionListar.php";
        $this->view->show($pathview, $vars);
        
    }

    public function listar2() {
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
        $pathview = $this->subviewpath . "gestionar/gestionarLeccionListar.php";
        $this->view->show($pathview, $vars);
    }
    public function registrar() {
        $ma = new NivelModel();
        $entity = new Nivel();
        $entity->setNivId($_REQUEST["nivId"]);
        $r = $ma->getById($entity);
        $vars = [];
        $vars["nivel"] = $r->data;
        $pathview = $this->subviewpath . "gestionar/gestionarLeccionRegistrar.php";
        $this->view->show($pathview, $vars);
    }
    public function insert() {
        extract($_REQUEST);
        $entity = new Leccion();
        $entity->setLecNombre($lecNombre);
        $entity->uploadFile($_FILES["lecImagen"]);
        $entity->setNivId($nivId);
        $model = new LeccionModel();
        $r = $model->insert($entity);
        header("location:?c=Leccion&a=listar&nivId={$nivId}");
    }
    

    public function delete() {
        $entity = new Leccion();
        $id = $_REQUEST["lecId"];
        $entity->setlecId($id);
//        $entity->setNivId($nivId);
        //***
        $m = new LeccionModel();
        $r = $m->delete($entity);
        //***
        header("location:?c=Leccion&a=listar    ");
    }

    public function frmEditar() {
        $entity = new Leccion();
        $id = ($_REQUEST["lecId"]);
        $entity->setLecId($id);
//        $entity->setNivId($nivId);
        $m = new LeccionModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/gestionar/gestionarLeccionEditar.php", $vars);
        } else {
            header("location:?c=Leccion&a=listar&nivId={$_REQUEST["nivId"]}");
        }
    }

    public function editar() {
        $r = null;
        if (isset($_POST["lecNombre"])) {
            $entity = new Leccion();
            $entity->setLecId($_REQUEST["lecId"]);
            $entity->setLecNombre($_REQUEST["lecNombre"]);
            $entity->uploadFile($_FILES["lecImagen"]);
            $entity->setNivId($_REQUEST["nivId"]);
            $m = new LeccionModel();
            $r = $m->update($entity);
        } else {
            $r = new stdClass();
            $r->status = 501;
            $r->msg = "";
        }
        header("location:?c=Leccion&a=listar&nivId={$_REQUEST["nivId"]}");
    }

}
