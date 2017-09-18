<?php

class LeccionModel implements IModel {

    private $table = "leccion";
    private $entity = "Leccion";
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
            $entity instanceof Leccion;
            extract($_REQUEST);
            $sql = "insert into {$this->table}  values(null,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getNivId());
            @$query->bindParam(2, $entity->getLecNombre());
            @$query->bindParam(3, $entity->getLecImagen());
            $query->execute();
//            print_r($query);
//            die();
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
            $entity instanceof Leccion;
            $sql = "delete from {$this->table} where lecId=? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getlecId());
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
            $obj instanceof Leccion;
            $sql = "update {$this->table} set lecNombre=?, lecImagen=? where lecId=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getLecNombre());
            @$query->bindParam(2, $obj->getLecImagen());
            @$query->bindParam(3, $obj->getLecId());
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
            $sql = "select * from {$this->table} order by lecId desc";
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
            $obj instanceof Leccion;
            $sql = "select * from {$this->table} where lecId = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getLecId());
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

    public function getByNivelId($nivId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from {$this->table} where nivId=? order by lecNombre asc";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $nivId);
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

    public function getCount($nivId, $filtro = null) {
        $retorno = new stdClass();
        try {
            $where = "";
            if ($filtro != "") {
                $where = " lecNombre like '%{$filtro}%' and";
            }
            $sql = "SELECT count(*) as cantidad FROM {$this->table} where {$where} nivId=? ";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $areId);
            $query->execute();
            $object = $query->fetchObject(); //stdClass
            $retorno->cantidad = $object->cantidad;
        } catch (PDOException $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }

    public function getPaginacion($nivId, $filtro = null, $paginador = null) {
        $r = new stdClass();
        try {
            $where = "";
            if ($filtro !== null) {
                $where = " lecNombre like '%{$filtro}%' and ";
            }
            $limit = "";
            if ($paginador instanceof Paginacion) {
                $c = Paginacion::$cantidadRegistros;
                $i = $paginador->getInicioLimit();
                $limit = "limit {$i},{$c}";
            }
            $sql = "Select * from {$this->table} where {$where} nivId=? order by lecNombre asc {$limit}";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $nivId);
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
 public function getCantidadRespuestasByLeccion($lecId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT count(*) as cantidad "
                    . "from pregunta as p "
                    . "natural join leccion as l "
                    . "natural join nivel as n "
                    . "where l.lecId=? ";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $lecId);
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
    public function getCantidadRespuestasByLeccionAndAprendiz($lecId, $aprId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT count(distinct(p.preId)) as cantidad "
                    . "from aprendiz as ap "
                    . "natural join respuesta as r "
                    . "natural join opcion_respuesta as op "
                    . "natural join pregunta as p "
                    . "natural join leccion as l "
                    . "natural join nivel as n "
                    . "where l.lecId=? and ap.aprId=? ";
            $query = $this->conexion->prepare($sql);
            $query->bindParam(1, $lecId);
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

}
