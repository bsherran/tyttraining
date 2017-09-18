<?php

class RespuestaModel implements IModel {
   private $table = "respuesta";
    private $entity = "Respuesta";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function delete($entity) {
        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $entity instanceof Respuesta;
            $sql = "delete from {$this->table} where opcId=? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getOpcId());
            $query->execute();
            $r->status = 200;
            $r->msg = "Registro {$this->entity} fue eliminado exitosamente.";
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
        }
        return $r;
    }

    public function get($entity) {
        $entity instanceof Respuesta;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} order by resFecha desc";
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
            $obj instanceof Respuesta;
            $sql = "select * from {$this->table} where resId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getResId());
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
    
    public function insert($entity) {
         $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {

            $entity instanceof Respuesta;
            extract($_REQUEST);
            $sql = "insert into {$this->table}  values(null,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getResFecha());
            @$query->bindParam(2, $entity->getOpcId());
            @$query->bindParam(3, $entity->getAprId());
            $query->execute();
//            print_r($query);
//            die();
            $entity->setResId($this->conexion->lastInsertId());
            $retorno->data = $entity;
            $retorno->status = 200;
            $retorno->msg = "Respuesta guardada con exito!";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    

    public function update($obj) {
        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $obj instanceof Respuesta;
            $sql = "update {$this->table} set resFecha=?, opcId=?, aprId=?, where resId=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getResFecha());
            @$query->bindParam(2, $obj->getOpcId());
            @$query->bindParam(3, $obj->getAprId());
            $query->execute();
            $r->status = 200;
            $r->msg = "{$this->entity} fue actualizado exitosamente!";
            $r->data = $obj;
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
        }
        return $r;
    }
    }


