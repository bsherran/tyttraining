<?php

class Nivel implements \JsonSerializable, \Serializable {

    //put your code here

    private $nivId;
    private $areId;
    private $nivNombre;
    private $nivImagen;
    private $cantidadPreguntas;
    private $cantidadRespuestas;

    function getNivId() {
        return $this->nivId;
    }

    function getNivNombre() {
        return $this->nivNombre;
    }

    function getNivImagen() {
        return $this->nivImagen;
    }

    function setNivId($nivId) {
        $this->nivId = $nivId;
    }

    function setNivNombre($nivNombre) {
        $this->nivNombre = $nivNombre;
    }

    function setNivImagen($nivImagen) {
        $this->nivImagen = $nivImagen;
    }

    public function jsonSerialize() {
        
    }

    public function serialize() {
        
    }

    public function unserialize($serialized) {
        
    }

    public function getAreId() {
        return $this->areId;
    }
    
    public function getCantidadPreguntas() {
        return $this->cantidadPreguntas;
    }

    public function getCantidadRespuestas() {
        return $this->cantidadRespuestas;
    }

    public function setCantidadPreguntas($cantidadPreguntas) {
        $this->cantidadPreguntas = $cantidadPreguntas;
    }

    public function setCantidadRespuestas($cantidadRespuestas) {
        $this->cantidadRespuestas = $cantidadRespuestas;
    }

    
    public function setAreId($areId) {
        $this->areId = $areId;
    }

    public function uploadFile($file) {
        $c = Config::singleton();
        $nombre = $file["name"];
        $path = "{$c->get("rassets")}nivel/{$nombre}";
        $tmp_path = $file["tmp_name"];
        move_uploaded_file($tmp_path, $path);
        $this->nivImagen = $nombre;
    }

}
