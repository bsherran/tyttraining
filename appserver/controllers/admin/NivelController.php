<?php

class NivelController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("models")}AreaModel.php";
        require "{$this->config->get("models")}NivelModel.php";
    }

    public function index() {
        
    }

    public function PaginacionArea() {

        $mNivel = new NivelModel();
        $r = $mNivel->getCount($_REQUEST["areId"], @$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        /*         * */
        $r = $mNivel->getPaginacion(@$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
    }

    public function exportarXLS() {
        $mNivel = new NivelModel();
        $r = $mNivel->get(null);
        $html = "<table>";
        $html .= "<tr>";
        $html .= "<td>Id</td>";
        $html .= "<td>Nombre</td>";
        $html .= "<td>Imagen</td>";
        $html .= "</tr>";
        foreach ($r->data as $nivel) {
            $nivel instanceof Nivel;
            $html .= "<tr height='100'>";
            $html .= "<td>{$nivel->getNivId()}</td>";
            $html .= "<td>{$nivel->getNivNombre()}</td>";
            $html .= "<td><img src='{$this->config->get('rassets')}nivel/{$nivel->getNivImagen()}' width='80' heigth='80' /></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ReporteNiveles.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $html;
    }

    public function listar() {
        $entity = new Area();
        $vars = [];
        $entity->setAreId($_REQUEST["areId"]);
        $mArea = new AreaModel();
        $ra = $mArea->getById($entity);
        $mNivel = new NivelModel();
        $r = $mNivel->getCount($_REQUEST["areId"], @$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);

        $r = $mNivel->getPaginacion($_REQUEST["areId"], @$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
        $vars["area"] = $ra->data;
        $vars["areId"] = $_REQUEST["areId"];
        $vars["data"] = $r->data;
        $vars["paginador"] = $paginador;
        $pathview = $this->subviewpath . "gestionar/gestionarNivelListar.php";
        $this->view->show($pathview, $vars);
    }

    public function registrar() {
        $ma = new AreaModel();
        $entity = new Area();
        $entity->setAreId($_REQUEST["areId"]);
        $r = $ma->getById($entity);
        $vars = [];
        $vars["area"] = $r->data;
        $pathview = $this->subviewpath . "gestionar/gestionarNivelRegistrar.php";
        $this->view->show($pathview, $vars);
    }

    public function insert() {
        extract($_REQUEST);
        $entity = new Nivel();
        $entity->setNivNombre($nivNombre);
        $entity->uploadFile($_FILES["nivImagen"]);
        $entity->setAreId($areId);
        $model = new NivelModel();
        $r = $model->insert($entity);
        header("location:?c=Nivel&a=listar&areId={$areId}");
    }

    public function delete() {
        $entity = new Nivel();
        $id = $_REQUEST["nivId"];
        $entity->setnivId($id);
//***
        $m = new NivelModel();
        $r = $m->delete($entity);
//print_r($r);
//***
        header("location:?c=Nivel&a=listar&areId={$_REQUEST["areId"]}");
        print_r($r);
        die();
    }

    public function frmEditar() {
        $entity = new Nivel();
        $id = ($_REQUEST["nivId"]);
        $entity->setNivId($id);
//$entity->setAreaId($_REQUEST["areaId"]);
        $m = new NivelModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/gestionar/gestionarNivelEditar.php", $vars);
        } else {
            header("location:?c=Nivel&a=listar&areId={$_REQUEST["areaId"]}");
        }
    }

    public function editar() {
        $r = null;
        if (isset($_POST["nivNombre"])) {
            $entity = new Nivel();
            $entity->setNivId($_REQUEST["nivId"]);
            $entity->setNivNombre($_REQUEST["nivNombre"]);
            $entity->uploadFile($_FILES["nivImagen"]);
            $entity->setAreaId($_REQUEST["areId"]);
            $m = new NivelModel();
            $r = $m->update($entity);
        } else {
            $r = new stdClass();
            $r->status = 501;
            $r->msg = "";
        }
        header("location:?c=Nivel&a=listar&areId={$_REQUEST["areId"]}");
    }

}
