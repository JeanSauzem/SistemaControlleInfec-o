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
class estatisca {
    private $codestatisca;
    private $unidade;
    private $mes;
    private $ano;
    private $saidas;
    private $obitos;
    private $indice;
    private $taxaocupacao;
    private $paciente_dia;
    
    function getCodestatisca() {
        return $this->codestatisca;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getSaidas() {
        return $this->saidas;
    }

    function getObitos() {
        return $this->obitos;
    }

    function getIndice() {
        return $this->indice;
    }

    function getTaxaocupacao() {
        return $this->taxaocupacao;
    }

    function getPaciente_dia() {
        return $this->paciente_dia;
    }

    function setCodestatisca($codestatisca) {
        $this->codestatisca = $codestatisca;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setSaidas($saidas) {
        $this->saidas = $saidas;
    }

    function setObitos($obitos) {
        $this->obitos = $obitos;
    }

    function setIndice($indice) {
        $this->indice = $indice;
    }

    function setTaxaocupacao($taxaocupacao) {
        $this->taxaocupacao = $taxaocupacao;
    }

    function setPaciente_dia($paciente_dia) {
        $this->paciente_dia = $paciente_dia;
    }


}
