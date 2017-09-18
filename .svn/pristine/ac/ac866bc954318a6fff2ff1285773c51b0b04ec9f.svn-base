<?php

class Leccion implements \JsonSerializable, \Serializable {

    //put your code here
    private $lecId;
    private $nivId;
    private $lecNombre;
    private $lecImagen;
     private $cantidadPreguntas;
    private $cantidadRespuestas;


    public function getLecId() {
        return $this->lecId;
    }

    public function getNivId() {
        return $this->nivId;
    }

    public function getLecNombre() {
        return $this->lecNombre;
    }

    public function getLecImagen() {
        return $this->lecImagen;
    }

    public function setLecId($lecId) {
        $this->lecId = $lecId;
    }

    public function setNivId($nivId) {
        $this->nivId = $nivId;
    }

    public function setLecNombre($lecNombre) {
        $this->lecNombre = $lecNombre;
    }

    public function setLecImagen($lecImagen) {
        $this->lecImagen = $lecImagen;
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

        
    public function unserialize($serialized) {
        foreach ($serialized as $key => $value) {
            $this->$key = $value;
        }
    }

    public function uploadFile($file) {
        $c = Config::singleton();
        $nombre = $file["name"];
        $path = "{$c->get("rassets")}leccion/{$nombre}";
        $tmp_path = $file["tmp_name"];
        move_uploaded_file($tmp_path, $path);
        $this->lecImagen = $nombre;
    }

    public function jsonSerialize() {
        
    }

    public function serialize() {
        
    }

}
