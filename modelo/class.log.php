<?php

class log{
    private $cod_user;
    private $acao;
    private $tipo;
    private $date;
    function getCod_user() {
        return $this->cod_user;
    }

    function getAcao() {
        return $this->acao;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDate() {
        return $this->date;
    }

    function setCod_user($cod_user) {
        $this->cod_user = $cod_user;
    }

    function setAcao($acao) {
        $this->acao = $acao;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDate($date) {
        $this->date = $date;
    }


    
    
    
}



?>

