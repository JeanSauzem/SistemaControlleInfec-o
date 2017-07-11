<?php

class PacienteDAO {

    function Validardata($data) {

        $data_array = explode("/", $data);
        $dia = $data_array[0];
        $mes = $data_array[1];
        $ano = $data_array[2];
        if (checkdate($mes, $dia, $ano) == 1) {
            return true;
        } else {
            return false;
        }
    }

    function formatar_data($data) {

        $data_array = explode("/", $data);
        $dia = $data_array[0];
        $mes = $data_array[1];
        $ano = $data_array[2];

        $data_sql = $ano . "-" . $mes . "-" . $dia;

        return $data_sql;
    }

    function formatar_data1($data) {

        $data_array = explode("-", $data);
        $dia = $data_array[0];
        $mes = $data_array[1];
        $ano = $data_array[2];

        $data_sql = $ano . "/" . $mes . "/" . $dia;

        return $data_sql;
    }

    function Verifica_Paciente($same) {
        $sql = "select * from paciente where Same ='" . $same . "' ";
        $query = mysql_query($sql);
        $validar = mysql_num_rows($query);
        return $validar;
    }

    function AdicionarPaciente($Paciente) {
        $sql = "INSERT INTO `paciente` (`codpaciente`, `NomePaciente`, `Same`, `DataNascimento`, `idade`, `genero`)"
                . " VALUES (NULL, '" . $Paciente->getNome() . "', '" . $Paciente->getSame() . "', '" . $Paciente->getDatanascimento() . "', '" . $Paciente->getIdade() . "', '" . $Paciente->getGenero() . "')";
        $query = mysql_query($sql);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    function ver_same($paciente,$same) {
        $valor = 0;
        $sql = "select * from paciente where Same = " . $paciente . " and Same != $same";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            $valor = 1;
        }
        return $valor;
    }

    function alterar_paciente($paciente, $id) {
        $sql = "UPDATE paciente SET NomePaciente ='" . $paciente->getNome() . "',"
                . " Same = '" . $paciente->getSame() . "' , DataNascimento='" . $paciente->getDatanascimento() . "' , "
                . "idade = '" . $paciente->getIdade() . "' , genero = '" . $paciente->getGenero() . "' where codpaciente='" . $id . "'";
        $query = mysql_query($sql);
        return $query;
    }

    function deletar_paciente($id) {
        $sql = "DELETE FROM paciente WHERE paciente.codpaciente = \"$id\"";
        $query = mysql_query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function listar_pacienteporid($id) {
        $sql = "select * from paciente where codpaciente=" . $id . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

    function listatodostabela() {
        $sql = "select * from paciente";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["idade"] . "</td><td>" . $linha["genero"] . "</td><td><a href=\"../controle/controlepaciente.php?tipo=excluir&id=" . $linha["codpaciente"] . "&same=" . $linha["Same"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlepaciente.php?tipo=alterar&id=" . $linha["codpaciente"] . "&same=" . $linha["Same"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }

    function listatodostabelasame($same) {
        $sql = "select * from paciente where Same=" . $same . " ";
        $query = mysql_query($sql);
        if ($query) {
            if (mysql_num_rows($query) > 0) {
                while ($linha = mysql_fetch_array($query)) {
                    echo "<tr><td>" . $linha["Same"] . "</td><td>" . $linha["NomePaciente"] . "</td><td>" . $linha["idade"] . "</td><td>" . $linha["genero"] . "</td><td><a href=\"../controle/controlepaciente.php?tipo=excluir&id=" . $linha["codpaciente"] . "&same=" . $linha["Same"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlepaciente.php?tipo=alterar&id=" . $linha["codpaciente"] . "&same=" . $linha["Same"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
                }
            }
        }
    }

    function PacienteporSame($same) {
        $sql = "select * from paciente where Same=" . $same . "";
        $query = mysql_query($sql);
        $linha = mysql_fetch_array($query);
        return $linha;
    }

}

?>