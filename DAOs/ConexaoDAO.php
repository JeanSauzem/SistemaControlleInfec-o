<?php

class ConexaoDAO {

    private $servidor = '127.0.0.1';
    private $banco = 'ccih_infeccao_cirurgia';
    private $usuario = 'root';
    private $senha = '';
    private $validaservidor;
    private $validabanco;

    function conexao() {
        $this->validaservidor = mysql_connect($this->servidor,$this->usuario,'');
        $this->validabanco= mysql_select_db($this->banco,$this->validaservidor);
        if(!$this->validabanco || !$this->validaservidor){
            echo mysql_error();
        }
    }

}
