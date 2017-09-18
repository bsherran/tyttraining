<?php

class Pregunta extends Leccion{
    //put your code here

    private $preId;
    private $preNombre;
    private $preTipoPregunta;
    private $opciones=[];
    
    public function getPreId() {
        return $this->preId;
    }

    public function getPreNombre() {
        return $this->preNombre;
    }

    public function getPreTipoPregunta() {
        return $this->preTipoPregunta;
    }
  
    public function setPreId($preId) {
        $this->preId = $preId;
    }

    public function setPreNombre($preNombre) {
        $this->preNombre = $preNombre;
    }

    public function setPreTipoPregunta($preTipoPregunta) {
        $this->preTipoPregunta = $preTipoPregunta;
    }
    public function getOpciones() {
        return $this->opciones;
    }

    public function setOpciones($opciones) {
        $this->opciones = $opciones;
    } 
}
