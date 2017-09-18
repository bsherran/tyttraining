<?php

class MovilModel {

    private $conexion = null;

    public function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function getAreasByAdministrador($admId) {
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {
            $sql = "SELECT a.* FROM area as a natural join area_administrador as ad WHERE ad.admid=? ";
            $query = $this->conexion->prepare($sql);
             $query->bindParam(1, $admId);
            $query->execute();
            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, "Area");
            $retorno->status = 200;
            $retorno->msg = "Consulta exitosa.";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }
}
