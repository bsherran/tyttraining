<?php


class Respuesta {
   private $resId;
   private $resFecha;
   private $opcId;
   private $aprId;

   
   public function getResId() {
       return $this->resId;
   }

   public function getResFecha() {
       return $this->resFecha;
   }

   public function getOpcId() {
       return $this->opcId;
   }

   public function getAprId() {
       return $this->aprId;
   }

   public function setResId($resId) {
       $this->resId = $resId;
   }

   public function setResFecha($resFecha) {
       $this->resFecha = $resFecha;
   }

   public function setOpcId($opcId) {
       $this->opcId = $opcId;
   }

   public function setAprId($aprId) {
       $this->aprId = $aprId;
   }

 
}
