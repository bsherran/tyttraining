<?php

class Persona implements \JsonSerializable, \Serializable {

  private $id;
  private $nombres;
  private $apellidos;
  private $identificacion;
  //Getters and Setters
  function getId() {
      return $this->id;
  }

  function getIdentificacion() {
      return $this->identificacion;
  }

  function getNombres() {
      return $this->nombres;
  }

  function getApellidos() {
      return $this->apellidos;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setIdentificacion($identificacion) {
      $this->identificacion = $identificacion;
  }

  function setNombres($nombres) {
      $this->nombres = $nombres;
  }

  function setApellidos($apellidos) {
      $this->apellidos = $apellidos;
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

?>