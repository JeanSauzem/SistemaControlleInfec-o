<?php

class LogDAO {

    function RegistrarLog($log) {
        $sql = "INSERT INTO logdados (codlog, id_user, acao, tipo, data_log, hora) "
                . "VALUES (NULL, " . $log->getCod_user() . ", '" . $log->getAcao() . "' , '" . $log->getTipo() . "' , '" . $log->getDate() . "','" .  date('H:i:s') . "')";
        $query = mysql_query($sql);
    }

    function CirurgiaRegistrada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function CirurgiaRegistradaListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function CirurgiaAlterada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario=logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='UP'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function CirurgiaAlteradaListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='UP'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function CirurgiaDeletada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='DEL'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function CirurgiaDeletadaListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='DEL'"
                . " AND logdados.tipo='CIRURGIA'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function InfeccaoAdicionada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function CirurgiaAdicionarListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function InfeccaocirAdicionada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='INFECCAOCIR'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function InfeccaocirAdicionarListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='ADD'"
                . " AND logdados.tipo='INFECCAOCIR'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function InfeccaoAlterada($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='UP'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }

    function InfeccaoAlterarListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='UP'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }

    function InfeccaoDeletar($id, $mes, $ano) {
        $sql = "SELECT count(*) as num"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='DEL'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha["num"];
    }
    
    function InfeccaoDeletarListar($id, $mes, $ano) {
        $sql = "SELECT *"
                . " FROM logdados, usuarios "
                . "where Month(logdados.data_log)=" . $mes . " AND "
                . "Year(logdados.data_log)=" . $ano . " AND "
                . "usuarios.cod_usuario= logdados.id_user AND usuarios.cod_usuario=$id "
                . " AND logdados.acao='DEL'"
                . " AND logdados.tipo='INFECCAO'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo"<tr><td>" . $linha["data_log"] . "</td><td>" . $linha["hora"] . "</td></tr>";
        }
    }
    function deletar_log($id){
        $sql="delete from logdados where id_user=".$id."";
        $query=mysql_query($sql);
        
    }
    
}

?>
