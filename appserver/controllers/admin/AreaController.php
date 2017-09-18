<?php

class AreaController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("models")}AreaModel.php";
    }

    public function index() {
        
    }
    public function exportarXLS() {
        $mArea = new AreaModel();
        $r = $mArea->get(null);
        $html = "<table>";
        $html .= "<tr>";
        $html .= "<td>Id</td>";
        $html .= "<td>Nombre</td>";
        $html .= "<td>Imagen</td>";
        $html .= "</tr>";
        foreach ($r->data as $area) {
            $area instanceof Area;
            $html .= "<tr height='100'>";
            $html .= "<td height='100'>{$area->getAreId()}</td>";
            $html .= "<td height='100'>{$area->getAreNombre()}</td>";
            $html .= "<td height='100'><img src='{$this->config->get('rassets')}areas/{$area->getAreImagen()}' width='80' heigth='80' /></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ReporteAreas.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $html;
    }

    public function PaginacionArea() {
       
        $mArea = new AreaModel();
        $r = $mArea->getCount(@$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;        
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        /***/
        $r=$mArea->getPaginacion(@$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
        
    }
    
    
    public function listar() {
        /*$entity = new Area();
        $mArea = new AreaModel();
        $r = $mArea->get($entity);
        $vars["data"] = $r->data;*/
        
        $mArea = new AreaModel();
        $r = $mArea->getCount(@$_REQUEST["termino"]);
        Paginacion::$cantidadRegistros = 5;        
        $paginador = new Paginacion($r->cantidad);
        $paginador->setPaginaActual(@$_REQUEST["pag"]);
        /***/
        $r=$mArea->getPaginacion(@$_REQUEST["termino"], $paginador); //->data, ->status, ->msg
//        print_r($r);
//        die();
        $vars["data"] = $r->data;
        $vars["paginador"] = $paginador;
        $pathview = $this->subviewpath . "gestionar/gestionarAreaListar.php";
        $this->view->show($pathview, $vars);
    }

    public function registrar() {
        $pathview = $this->subviewpath . "gestionar/gestionarAreaRegistrar.php";
        $this->view->show($pathview);
    }

    public function insert() {
        extract($_REQUEST);
        $entity = new Area();
        $entity->setAreNombre($areNombre);
        $entity->uploadFile($_FILES["areImagen"]);
        $model = new AreaModel();
        $r = $model->insert($entity);
        $pathview = $this->subviewpath . "gestionar/gestionarAreaRegistrar.php";
        header("location:?c=Area&a=listar");
    }

    public function delete() {
        $entity = new Area();
        $id = $_REQUEST["areId"];
        $entity->setAreId($id);
        print_r($entity);
        //***
        $m = new AreaModel();
        $r = $m->delete($entity);
        //***
        header("location:?c=Area&a=listar");
    }

    public function frmEditar() {
        $entity = new Area();
        $id = ($_REQUEST["areaId"]);
        $entity->setAreId($id);

        $m = new AreaModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/gestionar/gestionarAreaEditar.php", $vars);
        } else {
            header("location:?c=Area&a=listar");
        }
    }

    public function editar() {
        $r = null;
        if (isset($_POST["areNombre"])) {
            $entity = new Area();
            $entity->setAreId($_REQUEST["areId"]);
            $entity->setAreNombre($_REQUEST["areNombre"]);
            $entity->uploadFile($_FILES["areImagen"]);
            $m = new AreaModel();
            $r = $m->update($entity);
        } else {
            $r = new stdClass();
            $r->status = 501;
            $r->msg = "";
        }

        header("location:?c=Area&a=listar");
    }

}
