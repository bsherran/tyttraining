<?php

class Aprendiz extends Usuario implements \JsonSerializable,\Serializable {

    //Properties
    private $aprId;
    private $perIdentificacion;
    private $rol = "Aprendiz";

    function getAprId() {
        return $this->aprId;
    }

    function getPerIdentificacion() {
        return $this->perIdentificacion;
    }

    function setAprId($aprId) {
        $this->aprId = $aprId;
    }

    function setPerIdentificacion($perIdentificacion) {
        $this->perIdentificacion = $perIdentificacion;
    }

    function getRol() {
        return $this->rol;
    }

    public function jsonSerialize() { 
        $obj = new stdClass();
        foreach ($this as $key => $value) {
            $obj->{$key} = $value;
        }
        return $obj;
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
?>