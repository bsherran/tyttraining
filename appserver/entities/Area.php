<?php

class Area implements \JsonSerializable, \Serializable {

    //put your code here
    private $areId;
    private $areNombre;
    private $areImagen;
    private $areEstado;
    private $cantidadNiveles;
    private $cantidadLecciones;
    private $cantidadPreguntas;
    private $cantidadRespuestas;

    function getAreId() {
        return $this->areId;
    }

    function getAreNombre() {
        return $this->areNombre;
    }

    function getAreImagen() {
        return $this->areImagen;
    }

    function setAreId($areId) {
        $this->areId = $areId;
    }

    function setAreNombre($areNombre) {
        $this->areNombre = $areNombre;
    }

    function setAreImagen($areImagen) {
        $this->areImagen = $areImagen;
    }
    
    public function getAreEstado() {
        return $this->areEstado;
    }

    public function setAreEstado($areEstado) {
        $this->areEstado = $areEstado;
    }
    
    public function getCantidadNiveles() {
        return $this->cantidadNiveles;
    }

    public function getCantidadLecciones() {
        return $this->cantidadLecciones;
    }

    public function getCantidadPreguntas() {
        return $this->cantidadPreguntas;
    }

    public function setCantidadNiveles($cantidadNiveles) {
        $this->cantidadNiveles = $cantidadNiveles;
    }

    public function setCantidadLecciones($cantidadLecciones) {
        $this->cantidadLecciones = $cantidadLecciones;
    }

    public function setCantidadPreguntas($cantidadPreguntas) {
        $this->cantidadPreguntas = $cantidadPreguntas;
    }

    public function getCantidadRespuestas() {
        return $this->cantidadRespuestas;
    }

    public function setCantidadRespuestas($cantidadRespuestas) {
        $this->cantidadRespuestas = $cantidadRespuestas;
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

    public function uploadFile($file) {
        $c = Config::singleton();
        $nombre = $file["name"];
        //die();
        $path = "{$c->get("rassets")}areas/{$nombre}";
        $tmp_path = $file["tmp_name"];
        move_uploaded_file($tmp_path, $path);
        $this->areImagen = $nombre;
    }

}
