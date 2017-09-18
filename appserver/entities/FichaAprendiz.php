<?php


class FichaAprendiz {

    //put your code here
    private $ficId;
    private $aprId;

    function getFicId() {
        return $this->ficId;
    }

    function getAprId() {
        return $this->aprId;
    }

    function setFicId($ficId) {
        $this->ficId = $ficId;
    }

    function setAprId($aprId) {
        $this->aprId = $aprId;
    }

}
