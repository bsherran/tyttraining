<?php

class Usuario implements \JsonSerializable {

  //Properties
  private $usuId;
  private $usuLogin;
  private $usuPassword;
  private $perId;
  private $usuRol;
  private $perNombre;
  private $perApellido;
  //Getters and Setters

  function getUsuRol() {
      return $this->usuRol;
  }

  function setUsuRol($usuRol) {
      $this->usuRol = $usuRol;
  }

      
  function getUsuId() {
      return $this->usuId;
  }
  function getPerNombre() {
      return $this->perNombre;
  }

  function getPerApellido() {
      return $this->perApellido;
  }

  function setPerNombre($perNombre) {
      $this->perNombre = $perNombre;
  }

  function setPerApellido($perApellido) {
      $this->perApellido = $perApellido;
  }

  
  function getUsuLogin() {
      return $this->usuLogin;
  }

  function getUsuPassword() {
      return $this->usuPassword;
  }

  function getPerId() {
      return $this->perId;
  }

  function setUsuId($usuId) {
      $this->usuId = $usuId;
  }

  function setUsuLogin($usuLogin) {
      $this->usuLogin = $usuLogin;
  }

  function setUsuPassword($usuPassword) {
      $this->usuPassword = $usuPassword;
  }

  function setPerId($perId) {
      $this->perId = $perId;
  }

  
      
  public function jsonSerialize() {
    return get_object_vars($this);
  }

  public function serialize() {
    return $this->jsonSerialize();
  }

}

?>