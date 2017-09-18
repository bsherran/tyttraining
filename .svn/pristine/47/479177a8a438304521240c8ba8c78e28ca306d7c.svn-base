<?php

class PreguntaModel implements IModel {

    private $table = "pregunta";
    private $entity = "Pregunta";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

//Metodos

    public function insert($entity) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
//            echo "<pre>";
//            print_r($entity);
//            die();
            $entity instanceof Pregunta;
            extract($_REQUEST);
            $sql = "insert into {$this->table}  values(null,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getPreNombre());
            @$query->bindParam(2, $entity->getLecId());
            @$query->bindParam(3, $entity->getPreTipoPregunta());
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

    public function delete($entity) {

        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $entity instanceof Pregunta;
            $sql = "delete from {$this->table} where preId=? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getPreId());
            $query->execute();
            $r->status = 200;
            $r->msg = "Registro {$this->entity} fue eliminado exitosamente.";
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
        }
        return $r;
    }

    public function update($obj) {
        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $obj instanceof Pregunta;
            $sql = "update {$this->table} set preNombre=?, preTipoPregunta=? where PreId=?";
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

    public function get($entity) {
        $entity instanceof Categoria;
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
            $obj instanceof Pregunta;
            $sql = "select * from {$this->table} where preId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPreId());
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
    public function getPregunta(){
              $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $obj instanceof Pregunta;
            $sql = "SELECT * FROM pregunta WHERE preId NOT in (SELECt opcion_respuesta.preId FROM opcion_respuesta INNER JOIN respuesta ON respuesta.opcId = opcion_respuesta.opcId INNER JOIN pregunta ON pregunta.preId=opcion_respuesta.preId INNER JOIN leccion ON leccion.lecId=pregunta.lecId WHERE respuesta.aprId =1 AND opcion_respuesta.opcVerdadero = 1 AND leccion.lecId=25)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPreId());
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
    

    public function getByLeccionId($lecId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} where lecId=? order by preId desc";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $lecId);
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

    public function getCount($lecId, $filtro = null) {
        $retorno = new stdClass();
        try {
            $where = "";
            if ($filtro != "") {
                $where = " preNombre like '%{$filtro}%' and";
            }
            $sql = "SELECT count(*) as cantidad FROM {$this->table} where {$where} lecId=? ";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $lecId);
            $query->execute();
            $object = $query->fetchObject(); //stdClass
            $retorno->cantidad = $object->cantidad;
        } catch (PDOException $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }

    public function getPaginacion($lecId, $filtro = null, $paginador = null) {
        $r = new stdClass();
        try {
            $where = "";
            if ($filtro !== null) {
                $where = " preNombre like '%{$filtro}%' and ";
            }
            $limit = "";
            if ($paginador instanceof Paginacion) {
                $c = Paginacion::$cantidadRegistros;
                $i = $paginador->getInicioLimit();
                $limit = "limit {$i},{$c}";
            }
            $sql = "Select * from {$this->table} where {$where} lecId=? order by preNombre asc {$limit}";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $lecId);
            $query->execute();
            $r->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entity);
            if ($query->rowCount() > 0) {
                $r->status = 200;
                $r->msg = "Consulta de {$this->entity} exitosa!";
            } else {
                $r->status = 201;
                $r->msg = "Consulta exitosa,No hay registros!";
            }
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
            $r->data = null;
        }
        return $r;
    }
}
