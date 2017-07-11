<?php
ob_start();
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);

$tipo = $_GET["tipo"];

if ($tipo == "formsus") {
    $mes = $_GET["mes"];
    $ano = $_GET["ano"];
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
                            echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span> </button></a>";
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
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>

    <?php
    require_once("../dompdf/autoload.inc.php");
    $pdf = new Dompdf\Dompdf();
    $content = ob_get_clean();
    $pdf->loadHtml($content);
    $pdf->render();
    $out = $pdf->output(); 
    $nome = 'formsus.pdf';
    $pdf->stream($nome, array("Attachment" => 0));
} else if ($tipo == "cirurgia") {
    ?>
    <!DOCTYPE html>
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
            <div id="view">
                <div class="row">
                    <div class="col-sm-offset-0">
                        <div class="col-sm-10">

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

                            $mes = $_GET["mes"];
                            $ano = $_GET["ano"];

                            echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span> </button></a>";
                            echo "<div class=\"panel panel-default\">"
                            . "<div class=\"panel-heading\">Total Cirurgia por procedimento</div>";
                            echo"  <table class=\"table\">";
                            echo"<tr><td>Total Cirurgia  Pediatrica</td><td>Total Cirurgia Ginecologica</td><td>Total Obstetria</td><td>Total Transplante Renal</td><td>Total Cirurgia Toraxica</td><td>Total Cirurgia Ortopedica</td><td>Total Cirurgia Pediatrica </td><td>Total Cirurgia Vascular</td><td>Total Cirurgia Pescoço/Cabeça</td><td>Total Cirurgia Cardiaca</td><td>Total Cirurgia Geral</td><td>Total Cirurgia Neurologia </td></tr>";
                            echo"<tr><td>" . $cirurgia->TotalCirPed($mes, $ano) . "</td><td>" . $cirurgia->TotalGinecologia($mes, $ano) . "</td><td>" . $cirurgia->TotalObstetria($mes, $ano) . "</td><td>" . $cirurgia->TotalRenal($mes, $ano) . "</td><td>" . $cirurgia->TotalTora($mes, $ano) . "</td><td>" . $cirurgia->TotalTraumato($mes, $ano) . "</td><td>" . $cirurgia->TotalUro($mes, $ano) . "</td><td>" . $cirurgia->TotalVascular($mes, $ano) . "</td><td>" . $cirurgia->Totalcabeepesco($mes, $ano) . "</td><td>" . $cirurgia->Totalcardio($mes, $ano) . "</td><td>" . $cirurgia->Totalcirgeral($mes, $ano) . "</td><td>" . $cirurgia->Totalneuro($mes, $ano) . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Grafico procedimento</div>";
                            ?>
                            <script type="text/javascript">
                                $(function () {
                                    $('#container').highcharts({
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Total Procedimento '
                                        },
                                        subtitle: {
                                            text: 'Equipe CCIH'
                                        },
                                        xAxis: {
                                            categories: [
                                                'Total Cirurgia  Pediatrica',
                                                'Total Cirurgia Ginecologica',
                                                'Total Obstetria',
                                                'Total Transplante Renal',
                                                'Total Cirurgia Toraxica',
                                                'Total Cirurgia Ortopedica ',
                                                'Total Cirurgia Pediatrica ',
                                                'Total Cirurgia Vascular',
                                                'Total Cirurgia Pescoço/Cabeça',
                                                'Total Cirurgia Cardiaca',
                                                'Total Cirurgia Geral',
                                                'Total Cirurgia Neurologia '
                                            ],
                                            crosshair: true
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'qte'
                                            }
                                        },
                                        tooltip: {
                                        },
                                        plotOptions: {
                                            column: {
                                                pointPadding: 0.2,
                                                borderWidth: 0
                                            }
                                        },
                                        series: [{
                                                name: '<?php echo $mes . "/" . $ano ?>',
                                                data: [<?php echo $cirurgia->TotalCirPed($mes, $ano) ?>,<?php echo $cirurgia->TotalGinecologia($mes, $ano) ?>, <?php echo $cirurgia->TotalObstetria($mes, $ano) ?>,<?php echo $cirurgia->TotalRenal($mes, $ano) ?>, <?php echo $cirurgia->TotalTora($mes, $ano) ?>, <?php echo $cirurgia->TotalTraumato($mes, $ano) ?>, <?php echo $cirurgia->TotalUro($mes, $ano) ?>, <?php echo $cirurgia->TotalVascular($mes, $ano) ?>, <?php echo $cirurgia->Totalcabeepesco($mes, $ano) ?>, <?php echo $cirurgia->Totalcardio($mes, $ano) ?>, <?php echo $cirurgia->Totalcirgeral($mes, $ano) ?>, <?php echo $cirurgia->Totalneuro($mes, $ano) ?>]

                                            }]
                                    });
                                });
                            </script>
                            <script src="../Highcharts-4.1.5/js/highcharts.js"></script>
                            <script src="../Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <!--                        <script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>-->

                            <div id="container" style="height: 400px"></div>
                            <?php
                            echo"<div class=\"panel-heading\">Total Cirurgia pelas especialidade</div>";
                            echo"<table class=\"table\">";
                            echo"<tr><td>Artrodese de Hematoma</td><td>Drenagem de Hematoma</td><td>Tireoidectomia</td><td>Esvaziamento Ganglionar cervical</td><td>Lobectomia</td><td>CRM/ Valvuloplastia</td><td>Hérnia com ou sem Implante Cir.Geral </td><td>Colectestomia eletiva</td><td>Próteses de Quadril</td><td>Artrodese de Coluna Traumato</td><td>Nefrolitotomia</td><td>RTU</td></tr>";
                            echo"<tr><td>" . $cirurgia->Totalespecialidadeartrodese($mes, $ano) . "</td><td>" . $cirurgia->Totalespecialidadedrenagem($mes, $ano) . "</td><td>" . $cirurgia->Totalespecialidadetireodectomia($mes, $ano) . "</td><td>" . $cirurgia->Totalespecialidadeesvaziamento($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeLobectomia($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeCRM($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeHerniageral($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeColectestomia($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeProtequadril($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeArtrodesecol($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeNefrolitotomia($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeRTU($mes, $ano) . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Grafico Especialidades</div>";
                            ?>
                            <script type="text/javascript">
                                $(function () {
                                    $('#container1').highcharts({
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Total Especialidade '
                                        },
                                        subtitle: {
                                            text: 'Equipe CCIH'
                                        },
                                        xAxis: {
                                            categories: [
                                                'Artrodese de Hematoma',
                                                'Drenagem de Hematoma',
                                                'Tireoidectomia',
                                                'Esvaziamento Ganglionar cervical',
                                                'Lobectomia',
                                                'CRM/Valvuloplastia',
                                                'Hérnia com ou sem Implante Cir.Geral',
                                                'Colectestomia eletiva',
                                                'Próteses de Quadril',
                                                'Artrodese de Coluna Traumato',
                                                'Nefrolitotomia',
                                                'RTU'
                                            ],
                                            crosshair: true
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'qte'
                                            }
                                        },
                                        tooltip: {
                                        },
                                        plotOptions: {
                                            column: {
                                                pointPadding: 0.2,
                                                borderWidth: 0
                                            }
                                        },
                                        series: [{
                                                name: '<?php echo $mes . "/" . $ano ?>',
                                                data: [<?php echo $cirurgia->Totalespecialidadeartrodese($mes, $ano) ?>,
    <?php echo $cirurgia->Totalespecialidadedrenagem($mes, $ano) ?>,
    <?php echo $cirurgia->Totalespecialidadetireodectomia($mes, $ano) ?>,
    <?php echo $cirurgia->Totalespecialidadeesvaziamento($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeLobectomia($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeCRM($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeHerniageral($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeColectestomia($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeProtequadril($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeArtrodesecol($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeNefrolitotomia($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeRTU($mes, $ano) ?>]

                                            }]
                                    });
                                });
                            </script>
                            <script src="../Highcharts-4.1.5/js/highcharts.js"></script>
                            <script src="../Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <!--                        <script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>-->

                            <div id="container1" style="height: 400px"></div>
                            <?php
                            echo"<div class=\"panel-heading\">Total Cirurgia pelas especialidade</div>";
                            echo"<table class=\"table\">";
                            echo"<tr><td>Implante de duplo J</td><td>Bypass</td><td>Arterioplastica</td><td>Proteses Vascular abdonimal</td><td>Sitio Cirurgico</td><td>ITU</td><td>Mastectomia</td><td>Implante de Protese Mamaria</td><td>Hernia com ou Sem implante de próteses PED</td><td>DVP</td><td>DVE</td><td>Orquidopexia</td></tr>";
                            echo"<tr><td>" . $cirurgia->TotalespecialidadeImplanteduploj($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeBypass($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeArterioplastica($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeProtesesabdonimal($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeSitio($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeITU($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeMastectomia($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeImplanteMamaria($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeHerniaCirped($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeDVP($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeDVE($mes, $ano) . "</td><td>" . $cirurgia->TotalespecialidadeOrquidopexia($mes, $ano) . "</td></tr>";
                            echo"</table>";
                            echo"<div class=\"panel-heading\">Grafico Especialidades</div>";
                            ?>
                            <script type="text/javascript">
                                $(function () {
                                    $('#container2').highcharts({
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Total Especialidade '
                                        },
                                        subtitle: {
                                            text: 'Equipe CCIH'
                                        },
                                        xAxis: {
                                            categories: [
                                                'Implante de duplo J',
                                                'Bypass',
                                                'Arterioplastica',
                                                'Proteses Vascular abdonimal',
                                                'Sitio Cirurgico',
                                                'ITU',
                                                'Mastectomia',
                                                'Implante de Protese Mamaria',
                                                'Hernia com ou Sem implante de próteses PED',
                                                'DVP',
                                                'DVE',
                                                'Orquidopexia'

                                            ],
                                            crosshair: true
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'qte'
                                            }
                                        },
                                        tooltip: {
                                        },
                                        plotOptions: {
                                            column: {
                                                pointPadding: 0.2,
                                                borderWidth: 0
                                            }
                                        },
                                        series: [{
                                                name: '<?php echo $mes . "/" . $ano ?>',
                                                data: [<?php echo $cirurgia->TotalespecialidadeImplanteduploj($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeBypass($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeArterioplastica($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeProtesesabdonimal($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeSitio($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeITU($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeMastectomia($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeImplanteMamaria($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeHerniaCirped($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeDVP($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeDVE($mes, $ano) ?>,
    <?php echo $cirurgia->TotalespecialidadeOrquidopexia($mes, $ano) ?>]

                                            }]
                                    });
                                });
                            </script>
                            <script src="../Highcharts-4.1.5/js/highcharts.js"></script>
                            <script src="../Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <!--                        <script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>-->

                            <div id="container2" style="height: 400px"></div>
                            <?php
                            echo "</div>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>

        </body>
    </html>
    <?php
    require_once("../dompdf/autoload.inc.php");
    $pdf1 = new Dompdf\Dompdf();
    $content = ob_get_clean();
    $pdf1->loadHtml($content);
    $pdf1->render();
    $out1 = $pdf1->output();
    $nome1 = 'formsus.pdf';
    $pdf1->stream($nome1, array("Attachment" => 0));
} else if ($tipo == "paciente") {
    ?>
    <!DOCTYPE html>
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


                $paciente->Verifica_Paciente($_GET["same"]);
                echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span> </button></a>";
                echo "<div class=\"panel panel-default\">
                        <div class=\"panel-heading\">Informações Paciente</div>
                        <table class=\"table\">";
                $totalcir = $cirurgia->totaldeCirurgia($_GET["same"]);
                $totalinf = $infeccao->totalinfeccao($_GET["same"]);
                $paci = $paciente->PacienteporSame($_GET["same"]);
                echo"<tr><td>Nome Paciente</td><td>Idade</td><td>Sexo</td></tr>";
                echo"<tr><td>" . $paci["NomePaciente"] . "</td><td>" . $paci["idade"] . "</td><td>" . $paci["genero"] . "</td></tr></table>";
                echo"<div class=\"panel-heading\">Quantidade de Cirurgia <strong>" . $totalcir["num"] . "</strong></div><table class=\"table\">";
                echo"<tr><td>Procedimento/especialidade</td><td>Unidade</td><td>Tempo</td><td>Obito</td><td>Situacao</td></tr>";
                $listacir = $cirurgia->Lista_CirurgiaporPaciente($_GET["same"]);
                echo"</table>";
                echo"<div class=\"panel-heading\">Quantidade de infeccao <strong>" . $totalinf["num"] . "</strong></div><table class=\"table\">";
                echo"<tr><td>Topografia</td><td>Bacteria</td><td>Unidade</td><td>Obito</td></tr>";
                $infeccao->Lista_InfeccaoporPaciente($_GET["same"]);
                echo"</td></tr></table>";
                require_once("../dompdf/autoload.inc.php");
                $pdf2 = new Dompdf\Dompdf();
                $content = ob_get_clean();
                $pdf2->loadHtml($content);
                $pdf2->render();
                $out2 = $pdf2->output();
                $nome2 = 'formsus.pdf';
                $pdf2->stream($nome1, array("Attachment" => 0));
            } else if ($tipo == "geral") {
                ?>
                <!DOCTYPE html>
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
                        <div class="col-sm-offset-2">
                            <div class="col-sm-10">
                                <?php
                                include '../DAOs/DenominadoresDAO.php';
                                include '../DAOs/InfeccaoDAO.php';
                                include '../DAOs/cirurgiaDAO.php';
                                include '../DAOs/EstatisticaDAO.php';
                                include '../DAOs/ConexaoDAO.php';
                                include '../DAOs/UnidadeDAO.php';
                                $con = new ConexaoDAO();
                                $unidade1 = new UnidadeDAO();
                                $con->conexao();


                                $unidade = $_GET["unidade"];
                                $mes = $_GET["mes"];
                                $ano = $_GET["ano"];

                                $est = new EstatisticaDAO();
                                $inf = new InfeccaoDAO();
                                $cir = new cirurgiaDAO();
                                $den = new DenominadoresDAO();
                                echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span> </button></a>";
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
                                ?>   
                            </div>
                        </div>
                    </body>
                </html>
                <?php
                require_once("../dompdf/autoload.inc.php");
                $pdf3 = new Dompdf\Dompdf();
                $content = ob_get_clean();
                $pdf3->loadHtml($content);
                $pdf3->render();
                $out3 = $pdf3->output();
                $nome3 = 'formsus.pdf';
                $pdf3->stream($nome3, array("Attachment" => 0));
            } else if ($tipo == "acoes") {
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
                        <div clas="row">
                            <div class="col-sm-offset-3">
                                <div class="col-sm-7">
                                    <?php
                                    include '../DAOs/UsuariosDAOs.php';
                                    include '../DAOs/LogDAO.php';
                                    include '../DAOs/ConexaoDAO.php';
                                    $user = new UsuariosDAOs();
                                    $con = new ConexaoDAO();
                                    $con->conexao();
                                    $log = new LogDAO();
                                    $id = $_GET["usuario"];
                                    $mes = $_GET["mes"];
                                    $ano = $_GET["ano"];
                                    ?>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> </span>
                                                        <span class="text-success">Ações nas Cirurgias</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <span class="text-primary">Cirurgias Cadastradas</span>
                                                            <span class="label label-default"><?php echo $log->CirurgiaRegistrada($id, $mes, $ano) ?></span>
                                                        </div>
                                                        <table class="table">
                                                            <tr><td>Dia</td><td>Hora</td></tr>
                                                            <?php
                                                            $log->CirurgiaRegistradaListar($id, $mes, $ano);
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <span class="text-primary">Cirurgias Alteradas</span>
                                                            <span class="label label-default"><?php echo $log->CirurgiaAlterada($id, $mes, $ano) ?></span>
                                                        </div>
                                                        <table class="table">
                                                            <tr><td>Dia</td><td>Hora</td></tr>
                                                            <?php
                                                            $log->CirurgiaAlteradaListar($id, $mes, $ano);
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <span class="text-primary">Cirurgias Deletadas</span>
                                                            <span class="label label-default"><?php echo $log->CirurgiaDeletada($id, $mes, $ano) ?></span>

                                                        </div>
                                                        <table class="table">
                                                            <tr><td>Dia</td><td>Hora</td></tr>
                                                            <?php
                                                            $log->CirurgiaDeletadaListar($id, $mes, $ano);
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                                                            <span class="text-success">Ações nas Infeccão </span>
                                                        </a>

                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <span class="text-primary">Infecção Cadastradas</span>
                                                                <span class="label label-default"><?php echo $log->InfeccaoAdicionada($id, $mes, $ano) + $log->InfeccaocirAdicionada($id, $mes, $ano) ?></span>

                                                            </div>
                                                            <table class="table">
                                                                <tr><td>Dia</td><td>Hora</td></tr>
                                                                <?php
                                                                $log->CirurgiaAdicionarListar($id, $mes, $ano);
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <span class="text-primary">Infecção Alteradas</span>
                                                                <span class="label label-default"><?php echo $log->InfeccaoAlterada($id, $mes, $ano) ?></span>
                                                            </div>
                                                            <table class="table">
                                                                <tr><td>Dia</td><td>Hora</td></tr>
                                                                <?php
                                                                $log->CirurgiaAlteradaListar($id, $mes, $ano);
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <span class="text-primary">Infecção Deletadas</span>
                                                                <span class="label label-default"><?php echo $log->InfeccaoDeletar($id, $mes, $ano) ?></span>
                                                            </div>
                                                            <table class="table">
                                                                <tr><td>Dia</td><td>Hora</td></tr>
                                                                <?php
                                                                $log->InfeccaoDeletarListar($id, $mes, $ano);
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                </html>
                <?php
                require_once("../dompdf/autoload.inc.php");
                $pdf4 = new Dompdf\Dompdf();
                $content = ob_get_clean();
                $pdf4->loadHtml($content);
                $pdf4->render();
                $out4 = $pdf4->output();
                $nome4 = 'formsus.pdf';
                $pdf4->stream($nome1, array("Attachment" => 0));
            }
            ?>

