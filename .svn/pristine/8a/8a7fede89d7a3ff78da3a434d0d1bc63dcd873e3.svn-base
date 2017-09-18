<?php

class AreaModel implements IModel {

    private $table = "area";
    private $entity = "Area";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

//Metodos

    public function insert($entity) {
        $entity instanceof Area;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {

            $sql = "insert into {$this->table} values(null,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getAreNombre());
            @$query->bindParam(2, $entity->getAreImagen());
            $query->execute();
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
            $entity instanceof Area;
            $sql = "delete from {$this->table} where areId=? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getAreId());
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
            $obj instanceof Area;
            $sql = "update {$this->table} set areNombre=?, areImagen=? where areId=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAreNombre());
            @$query->bindParam(2, $obj->getAreImagen());
            @$query->bindParam(3, $obj->getAreId());
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
            $sql = "select * from {$this->table} order by areId desc";
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
            $obj instanceof Area;
            $sql = "select * from {$this->table} where areId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAreId());
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

    public function getCantidadNivelesByArea($areId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT COUNT(*) as cantidad FROM nivel AS n NATURAL JOIN area AS a WHERE a.areId=?";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $areId);
            $query->execute();
            $retorno->data = $query->fetchObject("stdClass");
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function getCantidadLeccionesByArea($areId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT COUNT(*) as cantidad FROM leccion AS l NATURAL JOIN nivel AS n NATURAL JOIN area AS a WHERE a.areId=?";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $areId);
            $query->execute();
            $retorno->data = $query->fetchObject("stdClass");
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function getCantidadPreguntaByArea($areId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT COUNT(*) as cantidad FROM pregunta AS p NATURAL JOIN leccion AS l NATURAL JOIN nivel AS n NATURAL JOIN area AS a WHERE a.areId=?";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $areId);
            $query->execute();
            $retorno->data = $query->fetchObject("stdClass");
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }
    
    public function getCantidadRespuestaByArea($areId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT COUNT(distinct(r.opcId)) as cantidad FROM "
                    . "respuesta AS r NATURAL JOIN "
                    . "opcion_respuesta AS rp NATURAL JOIN "
                    . "pregunta AS p NATURAL JOIN "
                    . "leccion AS l NATURAL JOIN "
                    . "nivel AS n NATURAL JOIN "
                    . "area AS a WHERE a.areId=?";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $areId);
            $query->execute();
            $retorno->data = $query->fetchObject("stdClass");
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }
    
    public function getCantidadRespuestaByAreaAndAprendiz($areId, $aprId) {
       $retorno = new stdClass();
       $retorno->data = null;
       $retorno->status = 0;
       $retorno->msg = "";
       try {
           $sql = "SELECT COUNT(distinct(p.preId)) as cantidad FROM "
                   . "respuesta AS r NATURAL JOIN "
                   . "opcion_respuesta AS rp NATURAL JOIN "
                   . "pregunta AS p NATURAL JOIN "
                   . "leccion AS l NATURAL JOIN "
                   . "nivel AS n NATURAL JOIN "
                   . "area AS a WHERE a.areId=? and r.aprId=?";
           $query = $this->conexion->prepare($sql);
           $query->bindParam(1, $areId);
           $query->bindParam(2, $aprId);
           $query->execute();
           $retorno->data = $query->fetchObject("stdClass");
           $retorno->status = 200;
           $retorno->msg = "Consulta exitosa.";
       } catch (PDOExeption $e) {
           $retorno->status = 500;
           $retorno->msg = $e->message;
       }
       return $retorno;
   }
public function getCount($filtro = null) {
        $retorno = new stdClass();
        try {
            $where = "";
            if ($filtro != "") {
                $where = "where areNombre like '%{$filtro}%'";
            }
            $sql = "SELECT count(*) as cantidad FROM {$this->table} {$where} ";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $object = $query->fetchObject(); //stdClass
            $retorno->cantidad = $object->cantidad;
        } catch (PDOException $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }

    public function getPaginacion($filtro = null, $paginador = null) {
        $r = new stdClass();
        try {
            $where = "";
            if ($filtro !== null) {
                $where = "where areNombre like '%{$filtro}%'";
            }
            $limit = "";
            if ($paginador instanceof Paginacion) {
                $c = Paginacion::$cantidadRegistros;
                $i = $paginador->getInicioLimit();
                $limit = "limit {$i},{$c}";
            }
            $sql = "Select * from {$this->table} {$where} order by areNombre asc {$limit}";
            $query = $this->conexion->prepare($sql);
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
