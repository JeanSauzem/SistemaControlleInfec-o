<?php
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
$erro = 0;
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
        <script src="../js/jquery.maskedinput.js"></script>
        <script src="../js/html2canvas.js"></script>
        <script src="../js/jspdf.min.js"></script>

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
        <?php
        include '../DAOs/ConexaoDAO.php';
        include '../DAOs/UnidadeDAO.php';
        $con = new ConexaoDAO();
        $unidade = new UnidadeDAO();
        $con->conexao();
        ?>
        <div class="row">
            <div class="col-sm-offset-4"><h2>Relatorios Geral Unidade</h2></div>
            <div class="col-sm-offset-3">
                <form class="form-horizontal" action="relatoriogeral.php" method="post" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="unidade">Selecione a Unidade</label>
                        <div class="col-sm-5">
                            <select class="form-control"  name="unidade">
                                <?php
                                $unidade->selectUnidade();
                                ?>
                            </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mes">Selecione o Mês:</label>
                        <div class="col-sm-5">
                            <select class="form-control"  id="selecao" name="mes">
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ano">Selecione o Ano:</label>
                        <div class="col-sm-5">
                            <select class="form-control"  id="selecao" name="ano">

                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-lg-offset-3">
                            <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" >Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-offset-2">
            <div class="col-sm-10">
                <?php
                include '../DAOs/DenominadoresDAO.php';
                include '../DAOs/InfeccaoDAO.php';
                include '../DAOs/cirurgiaDAO.php';
                include '../DAOs/EstatisticaDAO.php';
                if (isset($_POST["unidade"]) && isset($_POST["ano"]) && isset($_POST["mes"])) {
                    $unidade = $_POST["unidade"];
                    $mes = $_POST["mes"];
                    $ano = $_POST["ano"];

                    $est = new EstatisticaDAO();
                    $inf = new InfeccaoDAO();
                    $cir = new cirurgiaDAO();
                    $den = new DenominadoresDAO();
                    echo "<div class=\"panel panel-default\">"
                    . "<div class=\"panel-heading\">Total Cirurgia e Infeccao</div>";
                    echo"  <table class=\"table\">";
                    echo"<tr><td>Total Cirurgia</td><td>Total Cirurgia por Paciente</td><td>Total de Infeccção</td><td>Total de Infecção por Paciente</td></tr>";
                    echo"<tr><td>" . $cir->TotalCirurgiaMensal($unidade, $mes, $ano) . "</td><td>" . $cir->CirurgiaPaciente($unidade, $mes, $ano) . "</td><td>" . $inf->TotalInfeccaonaUnidade($unidade, $mes, $ano) . "</td><td>" . $inf->TotalInfeccaonaUnidadePaciente($unidade, $mes, $ano) . "</td></tr>";
                    echo"</table>";
                    echo"<div class=\"panel-heading\">Total em Cirurgias e Infeccção</div><table class=\"table\">";
                    echo"<tr><td>Obitos Cirurgias</td><td>Obitos Infecção</td></tr>";
                    echo"<tr><td>" . $cir->TotaldeCirurgiasObitos($unidade, $mes, $ano) . "</td><td>" . $inf->TotalInfeccaonaUnidadeObito($unidade, $mes, $ano) . "</td></tr>";
                    echo"</table>";
                    echo"<div class=\"panel-heading\">Totais das Situação das Cirurgias</div><table class=\"table\">";
                    echo"<tr><td>Cirurgias Limpas</td><td>Cirurgias Pontecial Contaminada</td><td>Cirurgias Contaminada</td><td>Cirurgias Infecionada</td></th>";
                    echo"<tr><td>" . $cir->TotalCirurgiaLimpa($unidade, $mes, $ano) . "</td><td>" . $cir->TotalCirurgiaPontecialContaminada($unidade, $mes, $ano) . "</td><td>" . $cir->TotalCirurgiaContaminada($unidade, $mes, $ano) . "</td><td>" . $cir->TotalCirurgiaInfeccionada($unidade, $mes, $ano) . "</td></tr>";
                    echo"</table>";
                    echo"<div class=\"panel-heading\">Total de infeccão nas Topografias</div><table class=\"table\">";
                    echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></th>";
                    echo"<tr><td>" . $inf->TotaldeIPCSL($unidade, $mes, $ano) . "</td><td>" . $inf->TotaldeIPCSC($unidade, $mes, $ano) . "</td><td>" . $inf->TotaldeITU($unidade, $mes, $ano) . "</td><td>" . $inf->TotaldePAVS($unidade, $mes, $ano) . "</td></tr>";
                    echo"</table>";
                    if ($den->ValidarUnidadeporDenominador($unidade, $mes, $ano) > 0) {
                        $denominador = $den->UnidadesDenominadores($unidade, $mes, $ano);
                        $denCateter = $denominador["cateter"];
                        $denRespirador = $denominador["respiradores"];
                        $denSolda = $denominador["solda"];
                    } else {
                        $denCateter = 0;
                        $denRespirador = 0;
                        $denSolda = 0;
                    }
                    echo"<div class=\"panel-heading\">Total de Denominadores</div><table class=\"table\">";
                    echo"<tr><td>Cateter</td><td>Solda</td><td>Respirador</td></tr>";
                    echo"<tr><td>" . $denCateter . "</td><td>" . $denSolda . "</td><td>" . $denRespirador . "</td></tr>";
                    echo"</table>";
                    if ($est->UnidadeEstatiscaValidar($unidade, $mes, $ano) > 0) {
                        $estatistica = $est->UnidadeEstatisca($unidade, $mes, $ano);
                        $pacientedia = $estatistica["pacientedia"];
                        $saida = $estatistica["saida"];
                        $taxaCVC = $denCateter / $pacientedia;
                        $taxaSVD = $denSolda / $pacientedia;
                        $taxaRES = $denRespirador / $pacientedia;
                    } else {
                        $pacientedia = 0;
                        $saida = 0;
                        $taxaCVC = 0;
                        $taxaSVD = 0;
                        $taxaRES = 0;
                    }
                    echo"<div class=\"panel-heading\">Taxa de Utilização do Denominadores </div><table class=\"table\">";
                    echo"<tr><td>Taxa Cateter</td><td>Taxa Solda</td><td>Taxa Respirador</td></th>";
                    echo"<tr><td>" . $taxaCVC . "</td><td>" . $taxaSVD . "</td><td>" . $taxaRES . "</td></tr>";
                    echo"</table>";
                    if ($denCateter == 0 && $denRespirador == 0 && $denSolda == 0) {
                        $denscateter = 0;
                        $denssolda = 0;
                        $denRespirador = 0;
                    } else {
                        $denscateter = $inf->TotaldeIPCSL($unidade, $mes, $ano) / $denCateter;
                        $denssolda = $inf->TotaldeITU($unidade, $mes, $ano) / $denSolda;
                        $denRespirador = $inf->TotaldePAVS($unidade, $mes, $ano) / $denRespirador;
                    }
                    echo"<div class=\"panel-heading\">Total de Densidade dos Denominadores</div><table class=\"table\">";
                    echo"<tr><td>Total Cateter</td><td>Total Respirador</td><td>Total Solda</td></tr>";
                    echo"<tr><td>" . $denscateter . "</td><td>" . $denRespirador . "</td><td>" . $denssolda . "</td></tr>";
                    echo"</table>";
                    if ($pacientedia == 0 && $saida == 0) {
                        $infeccaosaida = 0;
                        $infeccaopaciente = 0;
                    } else {
                        $infeccaopaciente = $inf->TotaldeInfeccao($unidade, $mes, $ano) / $pacientedia;
                        $infeccaosaida = $inf->TotaldeInfeccao($unidade, $mes, $ano) / $saida;
                    }
                    echo"<div class=\"panel-heading\">Total de ISC Paciente</div><table class=\"table\">";
                    echo"<tr><td>Infecção paciente por saidas</td><td>Infecção paciente por PacienteDia</td></tr>";
                    echo"<tr><td>" . $infeccaosaida . "</td><td>" . $infeccaopaciente . "</td></tr>";
                    echo"</table>"
                    . "</div>";
                    echo "<div class=\"col-sm-offset-5\">";
                    echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>Imprimir </button></a>";
                    echo" <a href=\"../controle/ControlePdf.php?tipo=geral&unidade=" . $unidade . "&mes=" . $mes . "&ano=" . $ano . "\"><button id=\"btn\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>Gerar PDF</button></a>";
                }echo "</div>";
                ?>   
            </div>
        </div>
    </body>
</html>