<?php

class InfeccaoDAO {

    function Inserir_Infeccao($infeccao) {
        $sql = "INSERT INTO `infeccao`(`codinfeccao`, `codunidade`, `codpaciente`, `codcirurgia`, `data_infeccao`, `codtopografia`, `obito`, `codbacteria`, `pesoRN`) "
                . "VALUES (NULL, '" . $infeccao->getUnidade() . "', '" . $infeccao->getPaciente() . "', '" . $infeccao->getCirurgia() . "', '" . $infeccao->getDatainfeccao() . "', '" . $infeccao->getTopografia() . "', '" . $infeccao->getObito() . "', '" . $infeccao->getBacteria() . "','" . $infeccao->getPesoRN() . "')";
        $query = mysql_query($sql);
        return $query;
    }

    function alterar_infeccao($infeccao, $id) {
        echo $id;
        $sql = "UPDATE infeccao SET codunidade ='" . $infeccao->getUnidade() . "' , codpaciente='" . $infeccao->getPaciente() . "' , codcirurgia='" . $infeccao->getCirurgia() . "' , data_infeccao='" . $infeccao->getDatainfeccao() . "' , codtopografia='" . $infeccao->getTopografia() . "' , obito='" . $infeccao->getObito() . "' , codbacteria='" . $infeccao->getBacteria() . "' , pesoRN='" . $infeccao->getPesoRN() . "'"
                . "where codinfeccao='" . $id . "'";
        $query = mysql_query($sql);
        return $query;
    }

    function deletainfeccaobacteria($id) {
        $sql = "delete from infeccao where codbacteria=" . $id . " ";
        $query = mysql_query($sql);
    }

    function listatodostabela() {
        $sql = "SELECT codinfeccao,Same,NomePaciente, nomeprocedimento, nomeespecialidade, tipotopografia, SiglaUnidade, nomebacteria, infeccao.obito
from infeccao, paciente, bacteria, topografia , unidade ,cirurgia , procedimento
where infeccao.codpaciente = paciente.Same AND
infeccao.codunidade = unidade.codunidade and
infeccao.codcirurgia = cirurgia.codcirurgia AND
infeccao.codtopografia = topografia.codtopografica AND
infeccao.codbacteria = bacteria.codbacteria AND
cirurgia.codprocedimento = procedimento.codprocedimento";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["nomeprocedimento"] . " - " . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipotopografia"] . "</td><td>" . $linha["obito"] . "</td><td><a href=\"../controle/controleinfeccao.php?tipo=excluir&cirurgia=sim&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleinfeccao.php?tipo=alterar&cirurgia=sim&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelasame($same) {
        $sql = "SELECT codinfeccao,Same,NomePaciente, nomeprocedimento, nomeespecialidade, tipotopografia, SiglaUnidade, nomebacteria, infeccao.obito
from infeccao, paciente, bacteria, topografia , unidade ,cirurgia , procedimento
where infeccao.codpaciente = paciente.Same AND
infeccao.codunidade = unidade.codunidade and
infeccao.codcirurgia = cirurgia.codcirurgia AND
infeccao.codtopografia = topografia.codtopografica AND
infeccao.codbacteria = bacteria.codbacteria AND
cirurgia.codprocedimento = procedimento.codprocedimento and
infeccao.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            while ($linha = mysql_fetch_array($query)) {
                echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["nomeprocedimento"] . " - " . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipotopografia"] . "</td><td>" . $linha["obito"] . "</td><td><a href=\"../controle/controleinfeccao.php?tipo=excluir&cirurgia=sim&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleinfeccao.php?tipo=alterar&cirurgia=sim&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
            }
        }
    }

    function deletarInfeccaoid($id) {
        $sql = "delete from infeccao where codinfeccao=" . $id . "";
        $query = mysql_query($sql);
        return $query;
    }

    function listatodosporcirurgia($id) {
        $sql = "SELECT * from infeccao, paciente, bacteria, topografia , unidade, cirurgia, procedimento
            where infeccao.codpaciente = paciente.Same AND
            infeccao.codunidade = unidade.codunidade and
            infeccao.codcirurgia = cirurgia.codcirurgia AND
            infeccao.codtopografia = topografia.codtopografica AND
            procedimento.codprocedimento=cirurgia.codprocedimento AND
            infeccao.codbacteria = bacteria.codbacteria AND
            codinfeccao = " . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function listatodossemcirurgia($id) {
        $sql = "SELECT *
from infeccao, paciente, bacteria, topografia , unidade
where infeccao.codpaciente = paciente.Same AND
infeccao.codunidade = unidade.codunidade and
infeccao.codcirurgia = 0 AND
infeccao.codtopografia = topografia.codtopografica AND
infeccao.codbacteria = bacteria.codbacteria 
AND codinfeccao = " . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function listatodostabelasemcirurgia() {
        $sql = "SELECT codinfeccao,Same,NomePaciente, tipotopografia, SiglaUnidade, nomebacteria, infeccao.obito
from infeccao, paciente, bacteria, topografia , unidade 
where infeccao.codpaciente = paciente.Same AND
infeccao.codunidade = unidade.codunidade and
infeccao.codcirurgia = 0 AND
infeccao.codtopografia = topografia.codtopografica AND
infeccao.codbacteria = bacteria.codbacteria";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>Sem Cirurgia</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipotopografia"] . "</td><td>" . $linha["obito"] . "</td><td><a href=\"../controle/controleinfeccao.php?tipo=excluir&cirurgia=nao&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleinfeccao.php?tipo=alterar&cirurgia=nao&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelasemcirurgiasame($same) {
        $sql = "SELECT codinfeccao,Same,NomePaciente, tipotopografia, SiglaUnidade, nomebacteria, infeccao.obito
from infeccao, paciente, bacteria, topografia , unidade 
where infeccao.codpaciente = paciente.Same AND
infeccao.codunidade = unidade.codunidade and
infeccao.codcirurgia = 0 AND
infeccao.codtopografia = topografia.codtopografica AND
infeccao.codbacteria = bacteria.codbacteria and
infeccao.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            while ($linha = mysql_fetch_array($query)) {
                echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>Sem Cirurgia</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipotopografia"] . "</td><td>" . $linha["obito"] . "</td><td><a href=\"../controle/controleinfeccao.php?tipo=alterar&cirurgia=nao&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controleinfeccao.php?tipo=alterar&cirurgia=nao&id=" . $linha["codinfeccao"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
            }
        }
    }

    function deletarinfeccaosame($same) {
        $sql = "delete from infeccao where codpaciente= " . $same . " ";
        $query = mysql_query($sql);
        return $query;
    }

    function totalinfeccao($same) {
        $sql = "SELECT COUNT(*) as num from infeccao where infeccao.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function Lista_InfeccaoporPaciente($same) {
        $sql = "SELECT * FROM infeccao, bacteria, topografia, unidade  WHERE infeccao.codbacteria=bacteria.codbacteria AND infeccao.codtopografia= topografia.codtopografica AND infeccao.codunidade= unidade.codunidade AND infeccao.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {

            echo "<tr><td>" . $linha["tipotopografia"] . "</td><td>" . $linha["nomebacteria"] . "</td> <td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["obito"] . "</td></tr>";
        }
    }

    function TotalUtipedIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=2 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtipedIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=2 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtipedPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=2 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtipedITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=2 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtiaduIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=1 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtiaduIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=1 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtiaduPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        Year(infeccao.data_infeccao) =" . $ano . " and
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtiaduITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnAIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 1 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnAIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 1 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnAPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 1 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnAITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 1 AND      
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnBIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 2 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnBIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 2 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnBPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 2 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnBITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 2 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnCIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 3 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnCIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 3 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnCPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 3 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnCITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 3 AND      
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnDIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 4 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnDIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 4 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnDPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 4 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnDITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 4 AND      
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnEIPCSL($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=1 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 5 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnEIPCSC($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=2 AND
        infeccao.codunidade=3 AND 
        infeccao.pesoRN = 5 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnEPAV($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=3 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 5 AND
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalUtirnEITU($mes, $ano) {
        $sql = "SELECT count(*) as num from infeccao
        where infeccao.codtopografia=4 AND
        infeccao.codunidade=1 AND
        infeccao.pesoRN = 5 AND      
        YEAR(infeccao.data_infeccao)=" . $ano . " AND
        Month(infeccao.data_infeccao) =" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function TotalInfeccaonaUnidadeObito($unidade, $mes, $ano) {
        $sql = "SELECT count(DISTINCT infeccao.codpaciente) as num 
        FROM infeccao 
        where infeccao.codunidade=" . $unidade . " AND
        Month(infeccao.data_infeccao)=" . $mes . " AND
        YEAR(infeccao.data_infeccao)=" . $ano . "  AND infeccao.obito='SIM'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalInfeccaonaUnidade($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
        FROM infeccao 
        where infeccao.codunidade=" . $unidade . " AND
        Month(infeccao.data_infeccao)=" . $mes . " AND
        YEAR(infeccao.data_infeccao)=" . $ano . " ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalInfeccaonaUnidadePaciente($unidade, $mes, $ano) {
        $sql = "SELECT COUNT(DISTINCT infeccao.codpaciente) as num 
        FROM infeccao 
        where infeccao.codunidade=" . $unidade . " AND
        Month(infeccao.data_infeccao)=" . $mes . " AND
        YEAR(infeccao.data_infeccao)=" . $ano . " ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldePAVS($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num FROM infeccao"
                . " WHERE infeccao.codunidade=" . $unidade . " AND "
                . "Month(infeccao.data_infeccao)=" . $mes . " AND "
                . "Year(infeccao.data_infeccao)=" . $ano . " AND"
                . " infeccao.codtopografia=3 ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldeITU($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num FROM infeccao"
                . " WHERE infeccao.codunidade=" . $unidade . " AND "
                . "Month(infeccao.data_infeccao)=" . $mes . " AND "
                . "Year(infeccao.data_infeccao)=" . $ano . " AND"
                . " infeccao.codtopografia=4 ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldeIPCSL($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num FROM infeccao"
                . " WHERE infeccao.codunidade=" . $unidade . " AND "
                . "Month(infeccao.data_infeccao)=" . $mes . " AND "
                . "Year(infeccao.data_infeccao)=" . $ano . " AND"
                . " infeccao.codtopografia=1 ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldeIPCSC($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num FROM infeccao"
                . " WHERE infeccao.codunidade=" . $unidade . " AND "
                . "Month(infeccao.data_infeccao)=" . $mes . " AND "
                . "Year(infeccao.data_infeccao)=" . $ano . " AND"
                . " infeccao.codtopografia=2 ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldeInfeccao($unidade, $mes, $ano) {
        $sql = "SELECT COUNT(DISTINCT infeccao.codpaciente) as num "
                . " from infeccao "
                . " WHERE infeccao.codunidade=" . $unidade . " AND "
                . "Month(infeccao.data_infeccao)=" . $mes . " AND "
                . "Year(infeccao.data_infeccao)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }
    
    function AlterarSameInfeccao($samev,$samen){
        $sql="UPDATE infeccao set infeccao.codpaciente=".$samen."
where infeccao.codpaciente=".$samev."";
        $query=mysql_query($sql);
        
    }
    

}
