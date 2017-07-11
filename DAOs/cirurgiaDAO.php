<?php

class cirurgiaDAO {

    function inserir_Cirurgia($cirurgia) {
        $sql = "INSERT INTO `cirurgia` (`codcirurgia`, `codprocedimento`, `codpaciente`, `proteses`, `obito`, `datacirurgia`, unidade , tempo , situacao)"
                . " VALUES (NULL, '" . $cirurgia->getProcedimento() . "', '" . $cirurgia->getPaciente() . "', '" . $cirurgia->getProteses() . "', '" . $cirurgia->getObito() . "','" . $cirurgia->getDatacirurgia() . "','" . $cirurgia->getUnidade() . "','" . $cirurgia->getTempo() . "','" . $cirurgia->getSituacao() . "')";
        $query = mysql_query($sql);

        return $query;
    }

    function alterar_Cirurgia($cirurgia, $id) {
        $sql = "update cirurgia set codprocedimento='" . $cirurgia->getProcedimento() . "', codpaciente= '" . $cirurgia->getPaciente() . "' ,proteses = '" . $cirurgia->getProteses() . "', obito= '" . $cirurgia->getObito() . "',datacirurgia= '" . $cirurgia->getDatacirurgia() . "',unidade='" . $cirurgia->getUnidade() . "' ,tempo ='" . $cirurgia->getTempo() . "'  , situacao= '" . $cirurgia->getSituacao() . "' where codcirurgia='" . $id . "' ";
        $query = mysql_query($sql);
        return $query;
    }

    function listar_cirurgias($same) {
        $sql = "select * from cirurgia, procedimento where cirurgia.codprocedimento = procedimento.codprocedimento and cirurgia.codpaciente =" . $same . "";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<option value=" . $linha["codcirurgia"] . ">" . $linha["datacirurgia"] . " - " . $linha["nomeprocedimento"] . "" . $linha["nomeespecialidade"] . "</option>";
        }
    }

    function validarpesquisacir($same) {
        $sql = "SELECT * FROM cirurgia, procedimento, unidade where cirurgia.codprocedimento = procedimento.codprocedimento AND cirurgia.unidade = unidade.codunidade AND cirurgia.codpaciente =" . $same . "";
        $query = mysql_query($sql);
        return $query;
    }

    function listatodostabelapesqcir($same) {
        $sql = "SELECT * FROM unidade, cirurgia, paciente,procedimento WHERE "
                . "unidade.codunidade = cirurgia.unidade "
                . "AND paciente.Same=cirurgia.codpaciente AND procedimento.codprocedimento=cirurgia.codprocedimento AND cirurgia.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        if (mysql_num_rows($query) > 0) {
            while ($linha = mysql_fetch_assoc($query)) {
                echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["nomeprocedimento"] . " - " . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["obito"] . "</td><td>" . $linha["tempo"] . "</td><td>" . $linha["situacao"] . "</td><td><a href=\"../controle/controlecirurgia.php?tipo=excluir&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlecirurgia.php?tipo=alterar&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
            }
        } 
    }

    function listarcirurgiaporid($id) {
        $sql = "SELECT * FROM cirurgia, procedimento, unidade where cirurgia.codprocedimento = procedimento.codprocedimento AND cirurgia.unidade = unidade.codunidade AND cirurgia.codcirurgia =" . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function Verificar_cirurgias($same) {
        $sql = "select * from cirurgia where codpaciente =" . $same . "";
        $query = mysql_query($sql);
        $valida = mysql_num_rows($query);
        return $valida;
    }

    function listatodostabelasame($same) {
        $sql = "SELECT * FROM unidade, cirurgia, paciente,procedimento "
                . "WHERE unidade.codunidade = cirurgia.unidade "
                . "AND paciente.Same=cirurgia.codpaciente "
                . "AND procedimento.codprocedimento=cirurgia.codprocedimento "
                . "AND cirurgia.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["nomeprocedimento"] . " - " . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["obito"] . "</td><td>" . $linha["tempo"] . "</td><td>" . $linha["situacao"] . "</td><td><a href=\"../controle/controlecirurgia.php?tipo=excluir&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlecirurgia.php?tipo=alterar&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabela() {
        $sql = "SELECT * FROM unidade, cirurgia, paciente,procedimento WHERE unidade.codunidade = cirurgia.unidade AND paciente.Same=cirurgia.codpaciente AND procedimento.codprocedimento=cirurgia.codprocedimento";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["nomeprocedimento"] . " - " . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td><td>" . $linha["obito"] . "</td><td>" . $linha["tempo"] . "</td><td>" . $linha["situacao"] . "</td><td><a href=\"../controle/controlecirurgia.php?tipo=excluir&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlecirurgia.php?tipo=alterar&id=" . $linha["codcirurgia"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function deletarcirurgiasame($same) {
        $sql = "delete from cirurgia where codpaciente= " . $same . " ";
        $query = mysql_query($sql);
        return $query;
    }

    function deletarcirurgia($id) {
        $sql = "delete from cirurgia where codcirurgia=" . $id . "";
        $query = mysql_query($sql);
        return $query;
    }

    function totaldeCirurgia($same) {
        $sql = "SELECT COUNT(codpaciente) as num FROM `cirurgia` WHERE cirurgia.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function Lista_CirurgiaporPaciente($same) {
        $sql = "select * from cirurgia, unidade , procedimento where cirurgia.codprocedimento= procedimento.codprocedimento AND cirurgia.unidade = unidade.codunidade AND cirurgia.codpaciente=" . $same . "";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["nomeprocedimento"] . "-" . $linha["nomeespecialidade"] . "</td><td>" . $linha["SiglaUnidade"] . "</td> <td>" . $linha["tempo"] . "</td><td>" . $linha["obito"] . "</td><td>" . $linha["situacao"] . "</td></tr>";
        }
    }

    function TotalprotesesMamaria($mes, $ano) {
        $sql = "SELECT count(*) as num from cirurgia
where cirurgia.codprocedimento=21 AND
cirurgia.proteses='SIM' AND 
Year(cirurgia.datacirurgia)=" . $ano . " and
Month(cirurgia.datacirurgia)=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalObstetria($mes, $ano) {
        $sql = "SELECT count(*) as num from cirurgia
where cirurgia.codprocedimento=19 AND
Year(cirurgia.datacirurgia)=" . $ano . " and
Month(cirurgia.datacirurgia)=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalprotesesTraumato($mes, $ano) {
        $sql = "SELECT count(*) as num FROM cirurgia, procedimento
        where cirurgia.codprocedimento=procedimento.codprocedimento AND
        procedimento.nomeprocedimento='Traumato'
        AND cirurgia.proteses='SIM' AND
        Year(cirurgia.datacirurgia)=" . $ano . " and
        Month(cirurgia.datacirurgia)=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalprotesesNeuro($mes, $ano) {
        $sql = "SELECT count(*) as num FROM cirurgia, procedimento
        where cirurgia.codprocedimento=procedimento.codprocedimento AND
        procedimento.nomeprocedimento='Neurocirurgia'
        AND cirurgia.proteses='SIM' AND
        Year(cirurgia.datacirurgia)=" . $ano . " and
        Month(cirurgia.datacirurgia)=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalprotesesCardio($mes, $ano) {
        $sql = "SELECT count(*) as num FROM cirurgia, procedimento
        where cirurgia.codprocedimento=procedimento.codprocedimento AND
        procedimento.nomeprocedimento='Cardíaca'
        AND cirurgia.proteses='SIM' AND
        Year(cirurgia.datacirurgia)=" . $ano . " and
        Month(cirurgia.datacirurgia)=" . $mes . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalneuro($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Neurocirurgia' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalcabeepesco($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Cabeça e pescoço' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalTora($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Torácica' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalcardio($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Cardíaca' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalcirgeral($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Cirurgia Geral' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalTraumato($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Traumato' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalUro($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Urologia' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalVascular($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Vascular' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalRenal($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Transplante Renal' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalObste($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Obstetrica' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalGinecologia($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Ginecologia' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirPed($mes, $ano) {
        $sql = "SELECT COUNT(*) as num
FROM cirurgia, procedimento
WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND
procedimento.nomeprocedimento='Cirurgia Pediatrica' and
Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalespecialidadeartrodese($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=1"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalespecialidadedrenagem($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=2"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalespecialidadetireodectomia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=3"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function Totalespecialidadeesvaziamento($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=4"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeLobectomia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=5"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeCRM($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=6"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeHerniageral($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=7"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeColectestomia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=8"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeProtequadril($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=9"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeArtrodesecol($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=10"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeNefrolitotomia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=11"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeRTU($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=12"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeImplanteduploj($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=13"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeBypass($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=14"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeArterioplastica($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=15"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeProtesesabdonimal($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=16"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeSitio($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=17"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeITU($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=18"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeCesarias($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=19"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeMastectomia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=20"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeImplanteMamaria($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=21"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeHerniaCirped($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=22"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeDVP($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=23"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeDVE($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=24"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalespecialidadeOrquidopexia($mes, $ano) {
        $sql = "select count(*) as num from cirurgia, procedimento"
                . " WHERE cirurgia.codprocedimento= procedimento.codprocedimento AND"
                . " procedimento.codprocedimento=25"
                . " and Month(cirurgia.datacirurgia)=" . $mes . " AND
year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirurgiaMensal($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
            FROM cirurgia 
            where cirurgia.unidade=" . $unidade . " AND 
            Month(cirurgia.datacirurgia)=" . $mes . " and
            year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirurgiaContaminada($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
            FROM cirurgia 
            where cirurgia.unidade=" . $unidade . " AND 
            Month(cirurgia.datacirurgia)=" . $mes . " and
            year(cirurgia.datacirurgia)=" . $ano . " AND
            cirurgia.situacao='Contaminada'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirurgiaLimpa($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
            FROM cirurgia 
            where cirurgia.unidade=" . $unidade . " AND 
            Month(cirurgia.datacirurgia)=" . $mes . " and
            year(cirurgia.datacirurgia)=" . $ano . " AND
            cirurgia.situacao='Limpa'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirurgiaPontecialContaminada($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
            FROM cirurgia 
            where cirurgia.unidade=" . $unidade . " AND 
            Month(cirurgia.datacirurgia)=" . $mes . " and
            year(cirurgia.datacirurgia)=" . $ano . " AND
            cirurgia.situacao='Potencial Contaminada'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotalCirurgiaInfeccionada($unidade, $mes, $ano) {
        $sql = "SELECT count(*) as num 
            FROM cirurgia 
            where cirurgia.unidade=" . $unidade . " AND 
            Month(cirurgia.datacirurgia)=" . $mes . " and
            year(cirurgia.datacirurgia)=" . $ano . " AND
            cirurgia.situacao='Infeccionada'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function TotaldeCirurgiasObitos($unidade, $mes, $ano) {
        $sql = "SELECT count(DISTINCT cirurgia.codpaciente) as num "
                . "FROM cirurgia "
                . "where cirurgia.unidade=" . $unidade . " "
                . "AND Month(cirurgia.datacirurgia)=" . $mes . " "
                . "and year(cirurgia.datacirurgia)=" . $ano . " "
                . "AND cirurgia.obito='SIM' ";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function CirurgiaPaciente($unidade, $mes, $ano) {
        $sql = "SELECT count(DISTINCT cirurgia.codpaciente) as num "
                . "from cirurgia "
                . "where cirurgia.unidade=" . $unidade . "  AND  Month(cirurgia.datacirurgia)=" . $mes . ""
                . " and year(cirurgia.datacirurgia)=" . $ano . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }
    function AlterarSameCirurgia($samev,$samen){
        $sql="UPDATE cirurgia set cirurgia.codpaciente=".$samen."
where cirurgia.codpaciente=".$samev."";
        $query=mysql_query($sql);
    }
}
