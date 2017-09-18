<?php

class OpcionRespuestaModel implements IModel {

    private $table = "opcion_respuesta";
    private $entity = "OpcionRespuesta";
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
            $entity instanceof OpcionRespuesta;
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
        $entity instanceof OpcionRespuesta;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} order by preId desc";
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
            $obj instanceof OpcionRespuesta;
            $sql = "select * from {$this->table} where popcId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getOpcId());
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
//            echo "<pre>";
//            print_r($entity);
//            die();
            $entity instanceof OpcionRespuesta;
            extract($_REQUEST);
            $sql = "insert into {$this->table}  values(null,?,?,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getPreId());
            @$query->bindParam(2, $entity->getOpcTipoRespuesta());
            @$query->bindParam(3, $entity->getOpcArchivo());
            @$query->bindParam(4, $entity->getOpcTexto());
            @$query->bindParam(5, $entity->getOpcVerdadero());
            $query->execute();
//            print_r($query);
//            die();
            $entity->setPreId($this->conexion->lastInsertId());
            $retorno->data = $entity;
            $retorno->status = 200;
            $retorno->msg = "";
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
            $obj instanceof OpcionRespuesta;
            $sql = "update {$this->table} set opcTipoRespuesta=?, opcArchivo=?, opcTexto=?, opcVerdadero=? where opcId=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPreNombre());
            @$query->bindParam(2, $obj->getPreTipoPregunta());
            @$query->bindParam(3, $obj->getPreId());
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

    public function getByPreguntaId($preId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} where preId=? order by opcId desc";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $preId);
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

}
