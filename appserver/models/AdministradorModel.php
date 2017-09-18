<?php

class AdministradorModel implements IModel {

//propiedades 
    private $table = "administrador";
    private $entity = "Administrador";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function delete($obj) {
        
    }

    public function get($entity) {
        $entity instanceof Administrador;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} order by admId desc";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entity);
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function getById($obj) {
        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $obj instanceof Administrador;
            $sql = "select * from {$this->table} where admId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAdmId());
            $query->execute();
            $r->data = $query->fetchObject($this->entity);
            if ($r->data instanceof $this->entity) {
                $r->status = 200;
                $r->msg = "{$this->entity} fue encontrado.";
            } else {
                $r->status = 201;
                $r->msg = "{$this->entity} no fue encontrado.";
            }
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
        }
        return $r;
    }

    public function insert($obj) {
        
    }

    public function update($obj) {
        
    }

    public function authUser($usuario) {

        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * "
                    . "from administrador a inner join usuario u "
                    . "on a.usuId = u.usuId "
                    . "inner join persona p "
                    . "on u.perId = p.perId "
                    . "where usuLogin=? and usuPassword=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $usuario->getUsuLogin());
            @$query->bindParam(2, $usuario->getUsuPassword());
            $query->execute();
            $retorno->data = $query->fetchObject($this->entity);
            if ($retorno->data instanceof $this->entity) {
                $retorno->status = 200;
                $retorno->msg = "Consulta exitosa.";
            } else {
                $retorno->status = 501;
                $retorno->msg = "Usuario no encontrado.";
            }
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

}
