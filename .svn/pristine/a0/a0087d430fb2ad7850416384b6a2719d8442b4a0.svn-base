<?php

class UsuarioModel implements IModel {

//propiedades 
  private $table = "usuario";
  private $entity = "Usuario";  
  private $conexion = null;

  public function __construct() {
    $this->conexion = SPDO::singleton();
  }

//Metodos
  public function get($query) {
    $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $sql = "select * from {$this->table} ";
      $query = $this->conexion->prepare($sql);
      $query->execute();
      $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entity);
      $retorno->status = 200;
      $retorno->msg = "Consulta exitosa.";
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }

  public function getById($id) {
    $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $sql = "select * from {$this->table} where id=?";
      $query = $this->conexion->prepare($sql);
      $query->bindParam(1, $id);
      $query->execute();
      $retorno->data = $query->fetchObject($this->entity);
      $retorno->status = 200;
      $retorno->msg = "Consulta exitosa.";
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }

  public function create($obj) {
      $obj instanceof Persona;
      $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $sql = "insert into {$this->table} values(null,?,?,?,?,?,?,?,?)";
      $query = $this->conexion->prepare($sql);



      $query->execute();
      $entity->setId($this->conexion->lastInsertId());
      $retorno->data = $entity;
      $retorno->status = 200;
      $retorno->msg = "Registro exitoso.";
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }

  public function update($entity) {
    $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $sql = "update {$this->table} "
              . "set perIdentificacion=?, perNomnbres=?, perApellidos=?,  "
              . "perCorreos=?, perTelefono=?, perLogin=?, "
              . "perPassword=?, perRol=? where id=?";
      
      $query = $this->conexion->prepare($sql);

      @$query->bindParam(1, $entity->getPerIdentificacion());
      @$query->bindParam(2, $entity->getPerNombres());
      @$query->bindParam(3, $entity->getPerApellidos());
      @$query->bindParam(4, $entity->getPerCorreo());
      @$query->bindParam(5, $entity->getPerTelefono());
      @$query->bindParam(6, $entity->getPerLogin());
      @$query->bindParam(7, $entity->getPerPassword());
      @$query->bindParam(8, $entity->getPerRol());
      @$query->bindParam(9, $entity->getId());

      $query->execute();
      $retorno->data = $entity;
      $retorno->status = 200;
      $retorno->msg = "Consulta exitosa.";
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }

  public function delete($entity) {
    $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $entity instanceof Archivo;
      $sql = "delete {$this->table} where id=?";
      $query = $this->conexion->prepare($sql);

      @$query->bindParam(1, $entity->getId());

      $query->execute();
      $entity->setId(null);
      $retorno->data = $entity;
      $retorno->status = 200;
      $retorno->msg = "Consulta exitosa.";
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }
  
  public function authUser(Usuario $usuario) {
      
    $retorno = new stdClass();
    $retorno->data = null;
    $retorno->status = 0;
    $retorno->msg = "";
    try {
      $sql = "select * from usuario u inner join persona p on u.perId where usuLogin=? and usuPassword=?";
      $query = $this->conexion->prepare($sql);
      @$query->bindParam(1, $usuario->getUsuLogin());
      @$query->bindParam(2, $usuario->getUsuPassword());
      $query->execute();
      $retorno->data = $query->fetchObject($this->entity);
      if($retorno->data instanceof $this->entity){
        $retorno->status = 200;
        $retorno->msg = "Consulta exitosa.";
      }else{
        $retorno->status = 501;
        $retorno->msg = "Usuario no encontrado.";
      }
      
    } catch (PDOExeption $e) {
      $retorno->status = 500;
      $retorno->msg = $e->message;
    }
    return $retorno;
  }

    public function insert($obj) {
        
    }
}
?>