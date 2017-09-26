<?php

class AdminController {

    private $view;
    private $config;
    private $subviewpath = "aprendiz/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Usuario.php";
        require "{$this->config->get("entities")}SuperAdministrador.php";
        require "{$this->config->get("models")}SuperAdministradorModel.php";
        require "{$this->config->get("models")}usuarioModel.php";
    }

    public function insert() {
        $entity = new Area();
        $id = ($_REQUEST["areaId"]);
        $entity->setAreId($id);
        $m = new AreaModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/registrarSupAdmin.php", $vars);
        }
    }

    public function listar() {                              
        $entity = new Administrador();
        $id = ($_REQUEST["admId"]);
        $entity->setAdmId($id);
        $m = new AdministradorModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/registrarSupAdmin.php", $vars);
        }
    }
    
    public function registrarSupAdmin() {
        extract($_REQUEST);
        $entity = new SuperAdministrador();
        $entity->setPerNombre();
        $entity->setPerApellido();
        $entity->uploadFile($_FILES["areImagen"]);
        $model = new SuperAdministradorModel();
        $r = $model->insert($entity);
        $pathview = $this->subviewpath . "gestionar/gestionarAreaRegistrar.php";
        header("location:?c=Area&a=listar");
    }

}
