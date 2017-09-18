<?php

class SuperAdministradorModel implements IModel {

   //propiedades 
   private $table = "super_administrador";
   private $entity = "SuperAdministrador";
   private $conexion = null;

   public function __construct() {
       $this->conexion = SPDO::singleton();
   }

   public function delete($obj) {
       
   }

   public function get($obj) {
       
   }

   public function getById($obj) {
       
   }

   public function insert($entity) {
        $entity instanceof SuperAdministrador;
        $retorno = new stdClass();
        $retorno->data = null;
        $retorno->status = 0;
        $retorno->msg = "";
        try {

            $sql = "insert into {$this->table} values(null,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $entity->getSubId());
            @$query->bindParam(2, $entity->getUsuId());
            $query->execute();
            $retorno->data = $entity;
            $retorno->status = 200;
            $retorno->msg = "";
        } catch (PDOExeption $e) {
            $retorno->status = 500;
            $retorno->msg = $e->message;
        }
        return $retorno;
    }
 

   public function update($obj) {
        $r = new stdClass();
        $r->status = 0;
        $r->msg = "";
        $r->data = null;
        try {
            $obj instanceof SuperAdministrador;
            $sql = "update {$this->table} set areNombre=?, areImagen=? where areId=?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAreNombre());
            @$query->bindParam(2, $obj->getAreImagen());
            @$query->bindParam(3, $obj->getAreId());
            $query->execute();
            $r->status = 200;
            $r->msg = "{$this->entity} fue actualizado exitosamente!";
            $r->data = $obj;
        } catch (PDOException $e) {
            $r->status = 500;
            $r->msg = $e->getMessage();
        }
        return $r;
    }

   public function authUser($usuario) {

       $retorno = new stdClass();
       $retorno->data = null;
       $retorno->status = 0;
       $retorno->msg = "";
       try {
           $sql = "select * "
                   . "from super_admistrador a inner join usuario u "
                   . "on a.usuId = u.usuId "
                   . "inner join persona p "
                   . "on u.perId = p.perId "
                   . "where usuLogin=? and usuPassword=?";
           $query = $this->conexion->prepare($sql);
           @$query->bindParam(1, $usuario->getUsuLogin());
           @$query->bindParam(2, $usuario->getUsuPassword());
           $query->execute();
           $retorno->data = $query->fetchObject($this->entity);
           if ($retorno->data instanceof $this->entity) {
               $retorno->status = 200;
               $retorno->msg = "Consulta exitosa.";
           } else {
               $retorno->status = 501;
               $retorno->msg = "Usuario no encontrado.";
           }
       } catch (PDOExeption $e) {
           $retorno->status = 500;
           $retorno->msg = $e->message;
       }
       return $retorno;
   }

}