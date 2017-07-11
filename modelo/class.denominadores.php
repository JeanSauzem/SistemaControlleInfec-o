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
class denominador {
    private $codDenominador;
    private $mes;
    private $ano;
    private $cateter;
    private $respirador;
    private $solda;
    private $unidade;
    function getCodDenominador() {
        return $this->codDenominador;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getCateter() {
        return $this->cateter;
    }

    function getRespirador() {
        return $this->respirador;
    }

    function getSolda() {
        return $this->solda;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function setCodDenominador($codDenominador) {
        $this->codDenominador = $codDenominador;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setCateter($cateter) {
        $this->cateter = $cateter;
    }

    function setRespirador($respirador) {
        $this->respirador = $respirador;
    }

    function setSolda($solda) {
        $this->solda = $solda;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }


}