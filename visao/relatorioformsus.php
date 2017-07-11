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
        <div class="row" >
            <div class="col-sm-offset-4"><h2>Relatório do FormSUS</h2></div>
            <div class="col-sm-offset-3">
                <form class="form-horizontal" action="relatorioformsus.php" method="post" role="form">
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
        <div id="view">
            <div class="row">
                <div class="col-sm-offset-3">
                    <div class="col-sm-8">

                        <?php
                        include '../DAOs/PacienteDAO.php';
                        include '../DAOs/cirurgiaDAO.php';
                        include '../DAOs/ConexaoDAO.php';
                        include '../DAOs/InfeccaoDAO.php';
                        include '../DAOs/DenominadoresDAO.php';
                        include '../DAOs/EstatisticaDAO.php';
                        $cirurgia = new cirurgiaDAO();
                        $con = new ConexaoDAO();
                        $paciente = new PacienteDAO();
                        $infeccao = new InfeccaoDAO();
                        $den = new DenominadoresDAO();
                        $est = new EstatisticaDAO();
                        $con->conexao();
                        if (isset($_POST["ano"]) && isset($_POST["mes"])) {

                            $mes = $_POST["mes"];
                            $ano = $_POST["ano"];
                            //proteses e cesarias
                            $protesesneuro = $cirurgia->TotalprotesesNeuro($mes, $ano);
                            $protesescardio = $cirurgia->TotalprotesesCardio($mes, $ano);
                            $protesestraumato = $cirurgia->TotalprotesesTraumato($mes, $ano);
                            $protesesmamaria = $cirurgia->TotalprotesesMamaria($mes, $ano);
                            $cesaria = $cirurgia->TotalObstetria($mes, $ano);

                            //infeccão uti ad
                            $infeccaoUtiadIPcsl = $infeccao->TotalUtiaduIPCSL($mes, $ano);
                            $infeccaoUtiadIPcsc = $infeccao->TotalUtiaduIPCSL($mes, $ano);
                            $infeccaoUtiaditu = $infeccao->TotalUtiaduITU($mes, $ano);
                            $infeccaoUtiadPAV = $infeccao->TotalUtiaduPAV($mes, $ano);

                            //infeccão uti ped
                            $infeccaoUtipedIPCSL = $infeccao->TotalUtipedIPCSL($mes, $ano);
                            $infeccaoUtipedIPCSC = $infeccao->TotalUtipedIPCSC($mes, $ano);
                            $infeccaoUtipeditu = $infeccao->TotalUtipedITU($mes, $ano);
                            $infeccaoUtipedpavs = $infeccao->TotalUtipedPAV($mes, $ano);

                            //infeccao uti rn a
                            $infeccaoutirnaIpcsl = $infeccao->TotalUtirnAIPCSL($mes, $ano);
                            $infeccaoutirnaIpcsc = $infeccao->TotalUtirnAIPCSC($mes, $ano);
                            $infeccaoutirnaitu = $infeccao->TotalUtirnAITU($mes, $ano);
                            $infeccaoutirnapav = $infeccao->TotalUtirnAPAV($mes, $ano);

                            $infeccaoutirnbIpcsl = $infeccao->TotalUtirnBIPCSL($mes, $ano);
                            $infeccaoutirnbIpcsc = $infeccao->TotalUtirnBIPCSC($mes, $ano);
                            $infeccaoutirnbitu = $infeccao->TotalUtirnBITU($mes, $ano);
                            $infeccaoutirnbpav = $infeccao->TotalUtirnBPAV($mes, $ano);

                            $infeccaoutirncIpcsl = $infeccao->TotalUtirnCIPCSL($mes, $ano);
                            $infeccaoutirncIpcsc = $infeccao->TotalUtirnCIPCSC($mes, $ano);
                            $infeccaoutirncitu = $infeccao->TotalUtirnCITU($mes, $ano);
                            $infeccaoutirncpav = $infeccao->TotalUtirnCPAV($mes, $ano);

                            $infeccaoutirndIpcsl = $infeccao->TotalUtirnCIPCSL($mes, $ano);
                            $infeccaoutirndIpcsc = $infeccao->TotalUtirnCIPCSC($mes, $ano);
                            $infeccaoutirnditu = $infeccao->TotalUtirnDITU($mes, $ano);
                            $infeccaoutirndpav = $infeccao->TotalUtirnDPAV($mes, $ano);

                            $infeccaoutirneIpcsl = $infeccao->TotalUtirnEIPCSL($mes, $ano);
                            $infeccaoutirneIpcsc = $infeccao->TotalUtirnEIPCSC($mes, $ano);
                            $infeccaoutirneitu = $infeccao->TotalUtirnEITU($mes, $ano);
                            $infeccaoutirnepav = $infeccao->TotalUtirnEPAV($mes, $ano);

                            if ($den->VerificaDenominadorUTIADULTO($mes, $ano) > 0) {
                                $denUTIAD = $den->DenominadoresUTIADULTO($mes, $ano);
                                $cateterad = $denUTIAD["cateter"];
                                $soldaad = $denUTIAD["solda"];
                                $respiradorad = $denUTIAD["respiradores"];
                            } else {
                                $cateterad = 0;
                                $soldaad = 0;
                                $respiradorad = 0;
                            }
                            if ($den->VerificaDenominadorUTIPED($mes, $ano) > 0) {
                                $denUTIPED = $den->DenominadoresUTIPED($mes, $ano);
                                $cateterped = $denUTIPED["cateter"];
                                $soldaped = $denUTIPED["solda"];
                                $respiradoped = $denUTIPED["respiradores"];
                            } else {
                                $cateterped = 0;
                                $soldaped = 0;
                                $respiradoped = 0;
                            }
                            if ($den->VerificaDenominadorUTIRN($mes, $ano) > 0) {
                                $denUTIRN = $den->DenominadoresUTIRN($mes, $ano);
                                $cateterRN = $denUTIRN["cateter"];
                                $soldaRN = $denUTIRN["solda"];
                                $respiradorRN = $denUTIRN["respiradores"];
                            } else {
                                $cateterRN = 0;
                                $soldaRN = 0;
                                $respiradorRN = 0;
                            }

                            if ($est->VerificarEstatisticaUTIAD($mes, $ano) > 0) {
                                $estAD = $est->EstatisticaUTIAD($mes, $ano);
                                $pacientediaad = $estAD["pacientedia"];
                                $saidaad = $estAD["saida"];
                                $obitoad = $estAD["obito"];
                                $taxaad = $estAD["ocupacao"];
                            } else {
                                $pacientediaad = 0;
                                $saidaad = 0;
                                $obitoad = 0;
                                $taxaad = 0;
                            }
                            if ($est->VerificarEstatisticaUTIPED($mes, $ano) > 0) {
                                $estPED = $est->EstatisticaUTIPED($mes, $ano);
                                $pacientediaped = $estPED["pacientedia"];
                                $saidaped = $estPED["saida"];
                                $obitoped = $estPED["obito"];
                                $taxaped = $estPED["ocupacao"];
                            } else {
                                $pacientediaped = 0;
                                $saidaped = 0;
                                $obitoped = 0;
                                $taxaped = 0;
                            }
                            if ($est->VerificarEstatisticaUTIRN($mes, $ano) > 0) {
                                $estRN = $est->EstatisticaUTIRN($mes, $ano);
                                $pacientediaRN = $estRN["pacientedia"];
                                $saidaRN = $estRN["saida"];
                                $obitoRN = $estRN["obito"];
                                $taxaRN = $estRN["ocupacao"];
                            } else {
                                $pacientediaRN = 0;
                                $saidaRN = 0;
                                $obitoRN = 0;
                                $taxaRN = 0;
                            }
                            echo "<div class=\"panel panel-default\">"
                            . "<div class=\"panel-heading\">Cirurgia com Proteses e cesarias</div>";
                            echo"  <table class=\"table\">";
                            echo"<tr><td>Cesarias</td><td>Proteses Neurologia</td><td>Proteses Cardiologia</td><td>Proteses Traumato</td><td>Proteses Mamaria</td></tr>";
                            echo"<tr><td>" . $cesaria . "</td><td>" . $protesesneuro . "</td><td>" . $protesescardio . "</td><td>$protesestraumato</td><td>" . $protesesmamaria . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Denominadores UTI ADULTO</div><table class=\"table\">";
                            echo"<tr><td>Cateter</td><td>Solda</td><td>Respirador</td></tr>";
                            echo"<tr><td>" . $cateterad . "</td><td>" . $soldaad . "</td><td>" . $respiradorad . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Estatistica UTI ADULTO</div><table class=\"table\">";
                            echo"<tr><td>Paciente/DIA</td><td>Saidas</td><td>Obito</td><td>Taxa Ocupacacao</td></th>";
                            echo"<tr><td>" . $pacientediaad . "</td><td>" . $saidaad . "</td><td>" . $obitoad . "</td><td>" . $taxaad . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI ADULTO</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></th>";
                            echo"<tr><td>" . $infeccaoUtiadIPcsl[0] . "</td><td>" . $infeccaoUtiadIPcsc[0] . "</td><td>" . $infeccaoUtiaditu[0] . "</td><td>" . $infeccaoUtiadPAV[0] . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Denominadores UTI PED</div><table class=\"table\">";
                            echo"<tr><td>Cateter</td><td>Solda</td><td>Respirador</td></tr>";
                            echo"<tr><td>" . $cateterped . "</td><td>" . $soldaped . "</td><td>" . $respiradoped . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Estatistica UTI PED</div><table class=\"table\">";
                            echo"<tr><td>Paciente/DIA</td><td>Saidas</td><td>Obito</td><td>Taxa Ocupacacao</td></th>";
                            echo"<tr><td>" . $pacientediaped . "</td><td>" . $pacientediaped . "</td><td>" . $obitoped . "</td><td>" . $taxaped . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI PED</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoUtipedIPCSL[0] . "</td><td>" . $infeccaoUtipedIPCSC[0] . "</td><td>" . $infeccaoUtipeditu[0] . "</td><td>" . $infeccaoUtipedpavs[0] . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Denominadores UTI RN</div><table class=\"table\">";
                            echo"<tr><td>Cateter</td><td>Solda</td><td>Respirador</td></tr>";
                            echo"<tr><td>" . $cateterRN . "</td><td>" . $soldaRN . "</td><td>" . $respiradorRN . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Estatistica UTI RN</div><table class=\"table\">";
                            echo"<tr><td>Paciente/DIA</td><td>Saidas</td><td>Obito</td><td>Taxa Ocupacacao</td></th>";
                            echo"<tr><td>" . $pacientediaRN . "</td><td>" . $saidaRN . "</td><td>" . $obitoRN . "</td><td>" . $taxaRN . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI RN PESO A</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoutirnaIpcsl[0] . "</td><td>" . $infeccaoutirnaIpcsc[0] . "</td><td>" . $infeccaoutirnaitu[0] . "</td><td>" . $infeccaoutirnapav[0] . "</td></th>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI RN PESO B</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoutirnbIpcsl[0] . "</td><td>" . $infeccaoutirnbIpcsc[0] . "</td><td>" . $infeccaoutirnbitu[0] . "</td><td>" . $infeccaoutirnbpav[0] . "</td></th>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI RN PESO C</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoutirncIpcsl[0] . "</td><td>" . $infeccaoutirncIpcsc[0] . "</td><td>" . $infeccaoutirncitu[0] . "</td><td>" . $infeccaoutirncpav[0] . "</td></th>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI RN PESO D</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoutirndIpcsl[0] . "</td><td>" . $infeccaoutirndIpcsc[0] . "</td><td>" . $infeccaoutirnditu[0] . "</td><td>" . $infeccaoutirndpav[0] . "</td></th>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Total de infeccão UTI RN PESO E</div><table class=\"table\">";
                            echo"<tr><td>Total IPCSL</td><td>Total IPCSC</td><td>Total ITU</td><td>TotalPAVs</td></tr>";
                            echo"<tr><td>" . $infeccaoutirneIpcsl[0] . "</td><td>" . $infeccaoutirneIpcsc[0] . "</td><td>" . $infeccaoutirneitu[0] . "</td><td>" . $infeccaoutirnepav[0] . "</td></th>";
                            echo"</table>"
                            . "</div>";
                            echo "<div class=\"col-sm-offset-4\">";
                            echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>Imprimir </button></a>";
                            echo "<a href=\"../controle/ControlePdf.php?tipo=formsus&mes=".$mes."&ano=".$ano."\"><button id=\"btn\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>Gerar PDF </button></a>";
                        }   echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
