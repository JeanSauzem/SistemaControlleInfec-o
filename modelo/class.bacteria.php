<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author JeanLocha
 */
class bacteria {
    private $codBacteria;
    private $nomeBacteria;
    private $tipoBacteria;
    
    function getCodBacteria() {
        return $this->codBacteria;
    }

    function getNomeBacteria() {
        return $this->nomeBacteria;
    }

    function getTipoBacteria() {
        return $this->tipoBacteria;
    }

    function setCodBacteria($codBacteria) {
        $this->codBacteria = $codBacteria;
    }

    function setNomeBacteria($nomeBacteria) {
        $this->nomeBacteria = $nomeBacteria;
    }

    function setTipoBacteria($tipoBacteria) {
        $this->tipoBacteria = $tipoBacteria;
    }


}
