<?php

class ProgramaModel {

    private $table = "programa";
    private $entity = "Programa";
    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

//Metodos

    public function insert($entity) {
        $entity instanceof Programa;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            extract($_REQUEST);        
            
            $sql = "insert into {$this->table} values(null,?)";
            $query = $this->conexion->prepare($sql);

            @$query->bindParam(1, $entity->getProNombre());            
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
        $entity instanceof Programa;

        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "DELETE FROM {$this->table} where proNombre= ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getProNombre());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "Eliminado correctamente";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

    public function getByKeywordPro($strquery = null) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            extract($_REQUEST);

            $condition = ' true ';
            if ($strquery !== null) {
                if (trim($keyword) && strlen($keyword) > 2) {
                    $condition .= "and (p.proNombre like '%{$keyword}%')";
                }
            }
            $sql = "select * from programa p where {$condition} limit 5";
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
        $entity instanceof Programa;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "update {$this->table} set programa = ? where proId = ? proNombre = ?";
            $query = $this->conexion->prepare($sql);

            @$query->bindParam(1, $entity->getPrograma());
//            @$query->bindParam(2, $entity->getProId());
            @$query->bindParam(3, $entity->getProNombre());            
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
        $entity instanceof Programa;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "select * from programa p where p.proNombre = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getProNombre());
            $query->execute();
            $retorno->data = $query->fetchObject($this->entity);

            $retorno->status = 200;
            $retorno->msg = "<i class='fa fa-check-circle'></i> El programa fue encontrado";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }

}
