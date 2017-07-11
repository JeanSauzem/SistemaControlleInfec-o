<?php

class EstatisticaDAO {

    function inserir_estatisca($est) {
        $sql = "INSERT INTO `estatistica` (`cosestatistica`, `codunidade`, `pacientedia`, `ano`, `mes`, `saida`, `obito`, `indice`, `ocupacao`) "
                . "VALUES (NULL," . $est->getUnidade() . " ," . $est->getPaciente_dia() . "," . $est->getAno() . "," . $est->getMes() . ", " . $est->getSaidas() . "," . $est->getObitos() . ", " . $est->getIndice() . "," . $est->getTaxaocupacao() . " )";
        $query = mysql_query($sql);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    function alterar_estatisca($est, $id) {
        $sql = "UPDATE `estatistica`  SET codunidade =" . $est->getUnidade() . " , pacientedia = " . $est->getPaciente_dia() . " , `ano` = " . $est->getAno() . " , `mes`= " . $est->getMes() . ", `saida`=" . $est->getSaidas() . " , `obito` = " . $est->getObitos() . ", `indice` = " . $est->getIndice() . " , `ocupacao` =" . $est->getTaxaocupacao() . "  "
                . "WHERE cosestatistica = " . $id . " ";
        $query = mysql_query($sql);
        return $query;
    }

    function deletar_estatisca($id) {
        $sql = "delete from estatistica where cosestatistica=" . $id . " ";
        $query = mysql_query($sql);
        return $query;
    }

    function buscartodosporid($id) {
        $sql = "SELECT *
FROM estatistica,unidade
where estatistica.codunidade= unidade.codunidade AND
estatistica.cosestatistica=" . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function validar_estatisca($est) {
        $sql = "select * from estatistica where codunidade =" . $est->getUnidade() . " and ano = " . $est->getAno() . " and mes = " . $est->getMes() . "";
        $query = mysql_query($sql);
        $validar = mysql_num_rows($query);
        return $validar;
    }

    function listatodostabela() {
        $sql = "select * from unidade, estatistica where estatistica.codunidade= unidade.codunidade ";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["mes"] . "</td><td>" . $linha["ano"] . "</td><td>" . $linha["indice"] . "</td><td>" . $linha["saida"] . "</td><td>" . $linha["pacientedia"] . "</td><td>" . $linha["ocupacao"] . "</td><td><a href=\"../controle/controledados.php?tipo=excluir&id=" . $linha["cosestatistica"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controledados.php?tipo=alterar&id=" . $linha["cosestatistica"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelaporselecao($ano, $mes, $unidade) {
        $sql = "select * from unidade, estatistica"
                . " where estatistica.codunidade= unidade.codunidade "
                . " and estatistica.codunidade=" . $unidade . " "
                . " and estatistica.mes=" . $mes . " "
                . " and estatistica.ano=" . $ano . "";
        $query = mysql_query($sql);
        if ($query) {
            if (mysql_num_rows($query)) {
                while ($linha = mysql_fetch_array($query)) {
                    echo "<tr><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["mes"] . "</td><td>" . $linha["ano"] . "</td><td>" . $linha["indice"] . "</td><td>" . $linha["saida"] . "</td><td>" . $linha["pacientedia"] . "</td><td>" . $linha["ocupacao"] . "</td><td><a href=\"../controle/controledados.php?tipo=excluir&id=" . $linha["cosestatistica"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controledados.php?tipo=alterar&id=" . $linha["cosestatistica"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
                }
            }
        }
    }

    function validar_estatistica($est) {
        $sql = "select * from estatistica where  ano = " . $est->getAno() . " and mes = " . $est->getMes() . " and codunidade = " . $est->getUnidade() . "";
        $query = mysql_query($sql);
        $validar = mysql_num_rows($query);
        return $validar;
    }

    function VerificarEstatisticaUTIAD($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=1 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    function EstatisticaUTIAD($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=1 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function VerificarEstatisticaUTIPED($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=2 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    function EstatisticaUTIPED($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=2 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function VerificarEstatisticaUTIRN($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=3 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }

    function EstatisticaUTIRN($mes, $ano) {
        $sql = "SELECT * FROM estatistica where estatistica.codunidade=3 AND estatistica.ano=" . $ano . " AND estatistica.mes=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function UnidadeEstatisca($unidade, $mes, $ano) {
        $sql = "SELECT *
        FROM estatistica
        WHERE estatistica.codunidade=" . $unidade . " AND
        estatistica.ano=" . $ano . " AND
        estatistica.mes=" . $mes . " ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function UnidadeEstatiscaValidar($unidade, $mes, $ano) {
        $sql = "SELECT *
        FROM estatistica
        WHERE estatistica.codunidade=" . $unidade . " AND
        estatistica.ano=" . $ano . " AND
        estatistica.mes=" . $mes . " ";
        $query = mysql_query($sql);
        $linha = mysql_num_rows($query);
        return $linha;
    }
    function UnidadeEstatiscaValidar_Altera($unidade, $mes, $ano, $id) {
        $v=0;
        $sql = "SELECT *
        FROM estatistica
        WHERE estatistica.codunidade=" . $unidade . " AND
        estatistica.ano=" . $ano . " AND
        estatistica.mes=" . $mes . " AND cosestatistica !=".$id." ";
        $query = mysql_query($sql);
        while($linha = mysql_fetch_array($query)){
            $v=1;
        }
        return $v;
    }

}
