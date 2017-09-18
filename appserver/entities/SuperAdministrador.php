<?php

class SuperAdministrador extends Usuario implements \JsonSerializable {

    //put your code here
    private $subId;
    private $rol = "SuperAdministrador";

    function getSubId() {
        return $this->subId;
    }

    function getUsuId() {
        return $this->usuId;
    }

    function setSubId($subId) {
        $this->subId = $subId;
    }

    function setUsuId($usuId) {
        $this->usuId = $usuId;
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

}
