<?php

class ServiciosWebController implements IController {
    
    private $view;
    private $config;
    private $conexion;

    public function __construct() {
        $this->config = Config::singleton();
        require_once "{$this->config->get("entities")}/Usuario.php";
        require_once "{$this->config->get("entities")}/Administrador.php";
        require_once "{$this->config->get("entities")}/SuperAdministrador.php";
        require_once "{$this->config->get("entities")}/Aprendiz.php";
        require_once "{$this->config->get("entities")}/Pregunta.php";
         require_once "{$this->config->get("entities")}/Area.php";
         
        require_once "{$this->config->get("models")}/PreguntaModel.php";
        require_once "{$this->config->get("models")}/UsuarioModel.php";
        require_once "{$this->config->get("models")}/AdministradorModel.php";
        require_once "{$this->config->get("models")}/SuperAdministradorModel.php";
        require_once "{$this->config->get("models")}/AprendizModel.php";
        require_once "{$this->config->get("models")}/AreaModel.php";
        require_once "{$this->config->get("models")}/MovilModel.php";
        
    }

    public function index() {
        $r = new stdClass();
        if (isset($_REQUEST["usuLogin"]) && isset($_REQUEST["usuPassword"])) {
            $usuario = new Usuario();
            $usuario->setUsuLogin($_REQUEST["usuLogin"]);
            $usuario->setUsuPassword($_REQUEST["usuPassword"]);
            $ma = new AdministradorModel();
            $r = $ma->authUser($usuario);
            if($r->status!==200){
                $ms = new SuperAdministradorModel();
                $r = $ms->authUser($usuario);
                if($r->status!==200){
                    $ma = new AprendizModel();
                    $r = $ma->authUser($usuario);
                }
            }
        } else {
            $r->status = 500;
            $r->msg = "Se requieren parametros!";
        }
        echo json_encode($r);
    }
    
    public function obtenerAreaAdministrador(){
       $mn = new MovilModel();
       $r = $mn->getAreasByAdministrador($_REQUEST["admId"]);
       echo json_encode($r);
    }

    public function ConsultarLecionNivel(){
        extract($_REQUEST);
        try {
            $consulta = "select count(*) 
                from pregunta as p 
                natural join leccion as l 
                natural join nivel as n al 
                join area as a 
                where a.areId = ?";
            $query = $this->conexion->$query($consulta);
            echo json_encode($query->fetchAll(PDO::FETCH_CLASS));
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }
    
    public function ObtenerNivelAprendiz(){
      extract($_REQUEST);
        try {
            $consulta = "select count(*) 
                from aprendiz as ap 
                natural join respuesta as r 
                natural join opcion_respuesta as op 
                natural join pregunta as p 
                natural join leccion as l 
                natural join nivel as n 
                natural join area as a 
                where a.areId=32 and ap.aprId=1";
            $query = $this->conexion->$query($consulta);
            echo json_encode($query->fetchAll(PDO::FETCH_CLASS));
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
            return false;
        }  
    }
}
