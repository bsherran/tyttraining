<?php

class Ficha implements \JsonSerializable, \Serializable {

    //put your code here
    private $ficId;
    private $ficCodigo;
    private $ficFechaInicio;
    private $ficFechaFin;
    private $proId;
    
    function getProId() {
        return $this->proId;
    }

    function setProId($proId) {
        $this->proId = $proId;
    }

        function getFicId() {
        return $this->ficId;
    }

    function getFicCodigo() {
        return $this->ficCodigo;
    }

    function getFicFechaInicio() {
        return $this->ficFechaInicio;
    }

    function getFicFechaFin() {
        return $this->ficFechaFin;
    }

    function setFicId($ficId) {
        $this->ficId = $ficId;
    }

    function setFicCodigo($ficCodigo) {
        $this->ficCodigo = $ficCodigo;
    }

    function setFicFechaInicio($ficFechaInicio) {
        $this->ficFechaInicio = $ficFechaInicio;
    }

    function setFicFechaFin($ficFechaFin) {
        $this->ficFechaFin = $ficFechaFin;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function serialize() {
        return $this->jsonSerialize();
    }

    public function unserialize($serialized) {
        foreach ($serialized as $key => $value) {
            $this->$key = $value;
        }
    }

}
