<?php
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
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
        <script src="../js/validacaocampos.js"></script>
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
            <div class=row>
                <div class="col-sm-offset-4">
                    <h2>Relatorio do Historico Paciente</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2">
                    <form class="form-horizontal" action="relatoriopaciente.php" method="post" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="same">Same do Paciente:</label>
                            <div class="col-sm-5">
                                <input type="type"  class="form-control" id="campos2" name="same" placeholder="Digite o Same" >
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" id="btnvalidar" class="btn btn-default" >Buscar</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                include '../DAOs/PacienteDAO.php';
                include '../DAOs/cirurgiaDAO.php';
                include '../DAOs/ConexaoDAO.php';
                include '../DAOs/InfeccaoDAO.php';
                $cirurgia = new cirurgiaDAO();
                $con = new ConexaoDAO();
                $paciente = new PacienteDAO();
                $infeccao = new InfeccaoDAO();
                $con->conexao();


                if (isset($_POST["same"])) {
                    if ($paciente->Verifica_Paciente($_POST["same"]) > 0) {
                        echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">Informações Paciente</div>
                        <table class=\"table\">";
                        $totalcir = $cirurgia->totaldeCirurgia($_POST["same"]);
                        $totalinf = $infeccao->totalinfeccao($_POST["same"]);
                        $paci = $paciente->PacienteporSame($_POST["same"]);
                        echo"<tr><td>Nome Paciente</td><td>Idade</td><td>Sexo</td></tr>";
                        echo"<tr><td>" . $paci["NomePaciente"] . "</td><td>" . $paci["idade"] . "</td><td>" . $paci["genero"] . "</td></tr></table>";
                        echo"<div class=\"panel-heading\">Quantidade de Cirurgia <strong>" . $totalcir["num"] . "</strong></div><table class=\"table\">";
                        echo"<tr><td>Procedimento/especialidade</td><td>Unidade</td><td>Tempo</td><td>Obito</td><td>Situacao</td></tr>";
                        $listacir = $cirurgia->Lista_CirurgiaporPaciente($_POST["same"]);
                        echo"</table>";
                        echo"<div class=\"panel-heading\">Quantidade de infeccao <strong>" . $totalinf["num"] . "</strong></div><table class=\"table\">";
                        echo"<tr><td>Topografia</td><td>Bacteria</td><td>Unidade</td><td>Obito</td></tr>";
                        $infeccao->Lista_InfeccaoporPaciente($_POST["same"]);
                        echo"</td></tr></table>";
                        echo "<div class=\"col-sm-offset-5\">";
                        echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>Imprimir</button></a>";
                        echo" <a href=\"../controle/ControlePdf.php?tipo=paciente&same=".$_POST["same"]."\"><button id=\"btn\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>Gerar PDF</button></a>";
                        echo "</div>";
                        
                    } else {
                        
                    }
                }
                ?>

            </div>
        </div>
