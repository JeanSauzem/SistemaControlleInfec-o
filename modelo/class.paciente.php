<?php

class paciente {

    private $id;
    private $nome;
    private $same;
    private $idade;
    private $datanascimento;
    private $genero;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getIdade() {
        return $this->idade;
    }

    function getGenero() {
        return $this->genero;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getNome() {
        return $this->nome;
    }

    function getSame() {
        return $this->same;
    }

    function getDatanascimento() {
        return $this->datanascimento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSame($same) {
        $this->same = $same;
    }

    function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

}
