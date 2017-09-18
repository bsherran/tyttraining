<?php

class Paginacion {

  public static $cantidadRegistros = 2;
  private $paginaActual = 1;
  private $cantidadDatos = 0;
  private $cantidadDePaginas = 0;
  //*****
  private $inicioLimit = 0;

  function __construct($cantidadDatos) {
    $this->cantidadDatos = $cantidadDatos;
    $this->cantidadDePaginas = ceil($this->cantidadDatos / self::$cantidadRegistros);
  }

  public function setPaginaActual($paginaActual) {
    if ($paginaActual > 0 && $paginaActual <= $this->cantidadDePaginas) {
      $this->paginaActual = $paginaActual;
    } else {
      $this->paginaActual = 1;
    }
    $this->inicioLimit = ($this->paginaActual - 1) * self::$cantidadRegistros;
  }

  public function getPaginaActual() {
    return $this->paginaActual;
  }

  public function getCantidadDePaginas() {
    return $this->cantidadDePaginas;
  }

  public function getInicioLimit() {
    return $this->inicioLimit;
  }

  public function getNavegacion() {
    $nav1 = new stdClass();
    $nav1->status = $this->paginaActual - 1 >= 1;
    $nav1->data = $this->paginaActual - 1;
    $navegacion["<"] = $nav1;

    for ($i = 1; $i <= $this->cantidadDePaginas; $i++) {
      $nav = new stdClass();
      $nav->status = !($this->paginaActual == $i);
      $nav->data = $i;
      $navegacion["{$i}"] = $nav;
    }

    $nav2 = new stdClass();
    $nav2->status = $this->paginaActual + 1 <= $this->cantidadDePaginas;
    $nav2->data = $this->paginaActual + 1;
    $navegacion[">"] = $nav2;
    return $navegacion;
  }

public function getNavHTML() {
   $path = "";
   foreach ($_REQUEST as $key => $value) {
       if($key!=="pag"){
           $path .= "{$key}={$value}&";
       }
   }
   
   $html = "<ul class='pagination'>";
   $navegacion = $this->getNavegacion();
   foreach ($navegacion as $key => $item) {
     if ($item->status) {
       $finalPath = "{$path}pag={$item->data}";
       $html .= "<li><a href='?{$finalPath}#tableData'>{$key}</a></li>";
     } else {
       if ($key != "<" && $key != ">"){
        $html .= "<li class='active'><a href='#'>{$key}</a></li>";
       }
     }
   }
   $html.="</ul>";
   return $html;
 }

}

