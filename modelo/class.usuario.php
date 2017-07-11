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
class usuario {
    private $codUsuario;
    private $nomeUsuario;
    private $nomeLogin;
    private $senha;
    private $tipo;
    private $matricula;
    private $funcao;
    function getFuncao() {
        return $this->funcao;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

        function getCodUsuario() {
        return $this->codUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getNomeLogin() {
        return $this->nomeLogin;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setNomeLogin($nomeLogin) {
        $this->nomeLogin = $nomeLogin;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }


}
