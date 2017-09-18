<?php

class Administrador extends Usuario implements \JsonSerializable {
    //put your code here
     private $admId;
      private $rol = "Administrador";
      
      function getAdmId() {
          return $this->admId;
      }

      function getUsuId() {
          return $this->usuId;
      }

      function setAdmId($admId) {
          $this->admId = $admId;
      }

      function setUsuId($usuId) {
          $this->usuId = $usuId;
      }
      function getRol() {
          return $this->rol;
      }

            public function jsonSerialize() {
          $obj = new stdClass();
          foreach ($this as $key =>$value){
              $obj->{$key} = $value;
          }
          return $obj;
      }
}
