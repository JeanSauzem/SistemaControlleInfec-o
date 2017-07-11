<?php
include_once "../controle/class.sessao.php";
session_start();

$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
$valores = $_SESSION["objeto"];
?>
﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Administrador</title>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery-1.11.3.min.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.maskedinput.js"></script>
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/jquery-ui.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">

            jQuery(function () {
                $("#datanascimento").mask("99/99/9999");
                $("#idade").mask("99");

            });
        </script>

    </head>
    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">CCIH-HUSM</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar"> 
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="cadastrarcirurgia.php">Cirurgia</a></li>
                                <li><a href="cadastrarinfeccao.php">Infecção</a></li>
                                <li><a href="cadastrardenominador.php">Denominador</a></li>
                                <li><a href="cadastrarbacteria.php">Bactéria</a></li>
                                <li><a href="cadastrardados.php">Dados</a></li>
                                <li><a href="cadastrarpaciente.php">Paciente</a></li>
                                <li><a href="cadastrarusuario.php">Usuário</a></li>

                            </ul>
                        </li>	
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Alterar/Excluir <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="vercirurgia.php">Cirurgia</a></li>
                                <li><a href="verinfeccao.php">Infecção</a></li>
                                <li><a href="verdenominador.php">Denominador</a></li>
                                <li><a href="verbacteria.php">Bactéria</a></li>
                                <li><a href="verdados.php">Dados</a></li>
                                <li><a href="verpaciente.php">Paciente</a></li>
                                <li><a href="verusuario.php">Usuário</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="relatoriopaciente.php">Historico Paciente</a></li>
                                <li><a href="relatoriocirurgia.php">Cirurgias</a></li>
                                <li><a href="relatoriogeral.php">Geral</a></li>
                                <li><a href="relatorioformsus.php">FormSUS</a></li>
                                <li><a href="relatorioacao.php">Ações</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../controle/sair.php"><span class="glyphicon glyphicon-remove"></span> Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <center>
                <div class=row>
                    <div class="col-sm-21">
                        <h2>Alterar Paciente</h2>
                    </div>
                </div>
            </center>

            <div class="row">
                <div class="col-sm-offset-3">
                    <form class="form-horizontal" action="alterarpaciente.php" method="post" role="form">


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="NomePaciente">Nome do Paciente:</label>
                            <div class="col-sm-5">
                                <input type="type"  class="form-control" id="campos2" name="NomePaciente" value="<?php echo $valores["NomePaciente"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Same">Digite o Same</label>
                            <div class="col-sm-5">          
                                <input type="text" class="form-control" id="campos3"  name="Same" value="<?php echo $valores["Same"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="genero">Selecione o Sexo</label>
                            <div class="col-sm-5">         
                                <select name="genero" class="form-control">
                                    <?php
                                    include '../modelo/class.paciente.php';
                                    include '../DAOs/PacienteDAO.php';
                                    include '../DAOs/ConexaoDAO.php';
                                    $con = new ConexaoDAO();
                                    $paciente = new PacienteDAO();
                                    if ($valores["genero"] == "Masculino") {
                                        echo"<option value=\"Masculino\" seleted>Masculino</option>
                                    <option value=\"Feminino\">Feminino</option>";
                                    } else if ($valores["genero"] == "Feminino") {
                                        echo"<option value=\"Masculino\">Masculino</option>
                                    <option value=\"Feminino\" seleted>Feminino</option>";
                                    } else {
                                        echo"<option value=\"Masculino\">Masculino</option>
                                    <option value=\"Feminino\" >Feminino</option>";
                                    }
                                    ?> 

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="DataNascimento">Data de Nascimento</label>
                            <div class="col-sm-5">         
                                <input type="text" name="DataNascimento" id="datanascimento" class="form-control" value="<?php echo $paciente->formatar_data1($valores["DataNascimento"]) ?>">
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-lg-offset-3">

                                <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" >Alterar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>	
        <div class="col-sm-offset-3">  
            <div class="col-sm-7">
                <?php
                include '../DAOs/InfeccaoDAO.php';
                include '../DAOs/cirurgiaDAO.php';
                if (isset($_POST["DataNascimento"]) && isset($_POST["genero"]) && isset($_POST["Same"]) && isset($_POST["NomePaciente"])) {
                    $con->conexao();
                    $paci = new paciente();
                    $cir = new cirurgiaDAO();
                    $inf = new InfeccaoDAO();

                    if ($_POST["Same"] == $valores["Same"]) {
                        if ($paciente->Validardata($_POST["DataNascimento"])) {
                            $datahoje = date("Y-m-d");
                            $dataNas = $paciente->formatar_data($_POST["DataNascimento"]);
                            $idade = $datahoje - $dataNas;

                            $paci->setDatanascimento($dataNas);
                            $paci->setGenero($_POST["genero"]);
                            $paci->setIdade($idade);
                            $paci->setNome($_POST["NomePaciente"]);
                            $paci->setSame($_POST["Same"]);


                            if ($paciente->alterar_paciente($paci, $valores["codpaciente"])) {
                                $_SESSSION["msg"] = 2;
                                echo"<script>location.href=\"../visao/verpaciente.php\"</script>";
                            }
                        } else {

                            echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Data Invalida</div></div>";
                        }
                    } else {
                        echo $paciente->ver_same($_POST["Same"], $valores["Same"]);
                        if ($paciente->ver_same($_POST["Same"], $valores["Same"]) == 0) {

                            if ($paciente->Validardata($_POST["DataNascimento"])) {
                                $datahoje = date("Y-m-d");
                                $dataNas = $paciente->formatar_data($_POST["DataNascimento"]);
                                $idade = $datahoje - $dataNas;
                                echo $dataNas;
                                $paci->setDatanascimento($dataNas);
                                $paci->setGenero($_POST["genero"]);
                                $paci->setIdade($idade);
                                $paci->setNome($_POST["NomePaciente"]);
                                $paci->setSame($_POST["Same"]);


                                if ($paciente->alterar_paciente($paci, $valores["codpaciente"])) {
                                    $_SESSSION["msg"] = 2;
                                    $cir->AlterarSameCirurgia($valores["Same"], $_POST["Same"]);
                                    $inf->AlterarSameInfeccao($valores["Same"], $_POST["Same"]);

                                    echo"<script>location.href=\"../visao/verpaciente.php\"</script>";
                                }
                            } else {
                                echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Data Invalida</div></div>";
                            }
                        } else {
                            echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Este Same Ja esta cadastrado</div></div>";
                        }
                    }
                }
                ?>
            </div>
        </div>