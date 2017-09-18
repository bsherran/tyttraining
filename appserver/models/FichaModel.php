<?php

class FichaModel {

    private $table = "ficha";
    private $entity = "Ficha";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

//Metodos

    public function insert($entity) {
        $entity instanceof Ficha;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            extract($_REQUEST);
            $entity->setProId($ficha[proId]);
            $entity->setFicFechaInicio($ficha[ficFechaInicio]);
            
            $sql = "insert into {$this->table} values(null,?,?,?,?)";
            $query = $this->conexion->prepare($sql);

            @$query->bindParam(1, $entity->getFicFechaInicio());
            @$query->bindParam(2, $entity->getFicFechaFin());
            @$query->bindParam(3, $entity->getFicCodigo());
            @$query->bindParam(4, $entity->getProId());
            $query->execute();
            $entity->setFicId($this->conexion->lastInsertId());
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
        $entity instanceof Ficha;

        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "DELETE FROM {$this->table} where ficCodigo= ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getFicCodigo());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "Eliminado correctamente";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function getByKeyword($strquery = null) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            extract($_REQUEST);

            $condition = ' true ';
            if ($strquery !== null) {
                if (trim($keyword) && strlen($keyword) > 2) {
                    $condition .= "and (f.ficCodigo like '%{$keyword}%' || p.proNombre like '%{$keyword}%' || p.ficFechaInicio like '%{$keyword}%' || p.ficFechaFin like '%{$keyword}%')";
                }
            }
            $sql = "select * from ficha as f natural join programa as p where {$condition} limit 5";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entity);
            if (count($retorno->data) == 0) {
                $retorno->status = 201;
                $retorno->msg = "No hay resultados para:" . $keyword;
            }
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function update($entity) {
        $entity instanceof Ficha;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "update {$this->table} set ficha = ? where ficId = ? ficCodigo = ? ficFechaInicio = ? ficFechaFin = ?";
            $query = $this->conexion->prepare($sql);

            @$query->bindParam(1, $entity->getFicha());
//            @$query->bindParam(2, $entity->getFicId());
            @$query->bindParam(3, $entity->getFicCodigo());
            @$query->bindParam(3, $entity->getFicFechaInicio());
            @$query->bindParam(3, $entity->getFicFechaFin());
            $query->execute();
            $entity->setIdCategoria($this->conexion->lastInsertId());
            $retorno->data = $entity;
            $retorno->status = 200;
            $retorno->msg = "";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function consultarIdentificacion($entity) {
        $entity instanceof Ficha;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from ficha as f natural join programa as p natural join persona as p where p.perIdentificacion = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getPerIdentificacion());
            $query->execute();
            $retorno->data = $query->fetchObject($this->entity);

            $retorno->status = 200;
            $retorno->msg = "<i class='fa fa-check-circle'></i> El aprendiz fue encontrado";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

}
