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
class cirurgia {
     private $codcirurgia;
     private $procedimento;
     private $unidade;
     private $obito;
     private $infeccao;
     private $datacirurgia;
     private $paciente;
     private $proteses;
     private $tempo;
     private $situacao;
     
     function getTempo() {
         return $this->tempo;
     }

     function getSituacao() {
         return $this->situacao;
     }

     function setTempo($tempo) {
         $this->tempo = $tempo;
     }

     function setSituacao($situacao) {
         $this->situacao = $situacao;
     }

          function getProteses() {
         return $this->proteses;
     }

     function setProteses($proteses) {
         $this->proteses = $proteses;
     }

          function getCodcirurgia() {
         return $this->codcirurgia;
     }

     function getProcedimento() {
         return $this->procedimento;
     }

     function getUnidade() {
         return $this->unidade;
     }

     function getObito() {
         return $this->obito;
     }

     function getInfeccao() {
         return $this->infeccao;
     }

     function getDatacirurgia() {
         return $this->datacirurgia;
     }

     function getPaciente() {
         return $this->paciente;
     }

     function setCodcirurgia($codcirurgia) {
         $this->codcirurgia = $codcirurgia;
     }

     function setProcedimento($procedimento) {
         $this->procedimento = $procedimento;
     }

     function setUnidade($unidade) {
         $this->unidade = $unidade;
     }

     function setObito($obito) {
         $this->obito = $obito;
     }

     function setInfeccao($infeccao) {
         $this->infeccao = $infeccao;
     }

     function setDatacirurgia($datacirurgia) {
         $this->datacirurgia = $datacirurgia;
     }

     function setPaciente($paciente) {
         $this->paciente = $paciente;
     }


     
}
