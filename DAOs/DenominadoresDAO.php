<?php

class DenominadoresDAO {

    function inserir_denominadores($deno) {
        $sql = "INSERT INTO `denominadores` (`coddenominadores`, `codunidade`, `ano`, `mes`, `cateter`, `respiradores`, `solda`) "
                . "VALUES (NULL, " . $deno->getUnidade() . ", " . $deno->getAno() . ", " . $deno->getMes() . ", " . $deno->getCateter() . ", " . $deno->getRespirador() . ", " . $deno->getSolda() . ")";
        $query = mysql_query($sql);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    function alterar_denominadores($deno, $id) {
        $sql = "UPDATE denominadores set codunidade=" . $deno->getUnidade() . " , ano = " . $deno->getAno() . " , mes =" . $deno->getMes() . " , cateter = " . $deno->getCateter() . " , respiradores = " . $deno->getRespirador() . ", solda = " . $deno->getSolda() . " WHERE   coddenominadores =" . $id . "  ";
        $query = mysql_query($sql);
        return $query;
    }

    function listatodostabela() {
        $sql = "select * from unidade, denominadores where denominadores.codunidade= unidade.codunidade ";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["mes"] . "</td><td>" . $linha["ano"] . "</td><td>" . $linha["cateter"] . "</td><td>" . $linha["solda"] . "</td><td>" . $linha["respiradores"] . "</td><td><a href=\"../controle/controledenominadores.php?tipo=excluir&id=" . $linha["coddenominadores"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controledenominadores.php?tipo=alterar&id=" . $linha["coddenominadores"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelaselect($mes, $ano, $unidade) {
        $sql = "select * from unidade, denominadores"
                . " where denominadores.codunidade= unidade.codunidade and "
                . " denominadores.codunidade=" . $unidade . " and "
                . " denominadores.mes=" . $mes . " and"
                . " denominadores.ano=" . $ano . "";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            while ($linha = mysql_fetch_array($query)) {
                echo "<tr><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["mes"] . "</td><td>" . $linha["ano"] . "</td><td>" . $linha["cateter"] . "</td><td>" . $linha["solda"] . "</td><td>" . $linha["respiradores"] . "</td><td><a href=\"../controle/controledenominadores.php?tipo=excluir&id=" . $linha["coddenominadores"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controledenominadores.php?tipo=alterar&id=" . $linha["coddenominadores"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
            }
        }
    }

    function listaporiddenominadores($id) {
        $sql = "SELECT * from denominadores, unidade where denominadores.codunidade=unidade.codunidade AND denominadores.coddenominadores=" . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function validar_denominadores($deno) {
        $sql = "select * from denominadores where  ano = " . $deno->getAno() . " and mes = " . $deno->getMes() . " and codunidade = " . $deno->getUnidade() . "";
        $query = mysql_query($sql);
        $validar = mysql_num_rows($query);
        return $validar;
    }

    function deletar_denominadores($id) {
        $sql = "delete from denominadores where coddenominadores=" . $id . "";
        $query = mysql_query($sql);
        return $query;
    }

    function DenominadoresUTIADULTO($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=1";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function VerificaDenominadorUTIADULTO($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=1";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    function DenominadoresUTIPED($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=2";

        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function VerificaDenominadorUTIPED($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=2";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    Function DenominadoresUTIRN($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=3";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function VerificaDenominadorUTIRN($mes, $ano) {
        $sql = "SELECT * FROM denominadores "
                . "where denominadores.ano=" . $ano . " AND denominadores.mes=" . $mes . " AND denominadores.codunidade=3";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    function UnidadesDenominadores($unidade, $mes, $ano) {
        $sql = "SELECT * 
        FROM denominadores 
        where denominadores.codunidade=" . $unidade . " AND 
        denominadores.ano=" . $ano . " AND
        denominadores.mes=" . $mes . " ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function ValidarUnidadeporDenominador($unidade, $mes, $ano) {
        $sql = "SELECT * 
        FROM denominadores 
        where denominadores.codunidade=" . $unidade . " AND 
        denominadores.ano=" . $ano . " AND
        denominadores.mes=" . $mes . " ";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }
    function ValidarDenominadorAlterar($unidade, $mes, $ano,$id) {
        $v=0;
        $sql = "SELECT * 
        FROM denominadores 
        where denominadores.codunidade=" . $unidade . " AND 
        denominadores.ano=" . $ano . " AND
        denominadores.mes=" . $mes . " AND denominadores.coddenominadores != ".$id."";
        $query = mysql_query($sql);
        while($linha = mysql_fetch_array($query)){
            $v=1;
        }
        return $v;
    }

}
