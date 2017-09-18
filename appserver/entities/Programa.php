<?php

class Programa implements \JsonSerializable{
    //put your code here
    private $Proid;
    private $proNombre;
    
    function getProid() {
        return $this->Proid;
    }

    function getProNombre() {
        return $this->proNombre;
    }

    function setProid($Proid) {
        $this->Proid = $Proid;
    }

    function setProNombre($proNombre) {
        $this->proNombre = $proNombre;
    }

    public function jsonSerialize() {
        $ob = new stdClass();
        foreach ($this as $key => $value) {
            $ob->{$key} = $value;
        }
        return $ob;
    }

}
