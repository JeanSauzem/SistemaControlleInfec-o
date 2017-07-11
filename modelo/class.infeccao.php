<?php

class infeccao {
    
    private $paciente;
    private $topografia;
    private $bacteria;
    private $datainfeccao;
    private $obito;
    private $unidade;
    private $cirurgia;
    private $pesoRN;
    function getPesoRN() {
        return $this->pesoRN;
    }

    function setPesoRN($pesoRN) {
        $this->pesoRN = $pesoRN;
    }

        function getUnidade() {
        return $this->unidade;
    }

    function getCirurgia() {
        return $this->cirurgia;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    function setCirurgia($cirurgia) {
        $this->cirurgia = $cirurgia;
    }

        
    function getPaciente() {
        return $this->paciente;
    }

    function getTopografia() {
        return $this->topografia;
    }

    function getBacteria() {
        return $this->bacteria;
    }

    function getDatainfeccao() {
        return $this->datainfeccao;
    }

    function getObito() {
        return $this->obito;
    }

    function setPaciente($paciente) {
        $this->paciente = $paciente;
    }

    function setTopografia($topografia) {
        $this->topografia = $topografia;
    }

    function setBacteria($bacteria) {
        $this->bacteria = $bacteria;
    }

    function setDatainfeccao($datainfeccao) {
        $this->datainfeccao = $datainfeccao;
    }

    function setObito($obito) {
        $this->obito = $obito;
    }


    
    
    
    
}
