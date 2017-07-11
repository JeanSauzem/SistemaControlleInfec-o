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

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">

            jQuery(function () {
                $("#datainfecao").mask("99/99/9999");

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
        <div class="row">
            <div class="col-sm-offset-5">
                <h2> Relatório  das Cirurgias</h2>
            </div>
            <div class="col-sm-offset-3">
                <form class="form-horizontal" action="relatoriocirurgia.php" method="post" role="form">
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
                <div class="col-sm-offset-1">
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
                        if (isset($_POST["ano"]) && isset($_POST["mes"])) {

                            $mes = $_POST["mes"];
                            $ano = $_POST["ano"];

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
                            echo "<div class=\"col-sm-offset-5\">";
                            echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>Imprimir</button></a>";
                            echo" <a href=\"../controle/ControlePdf.php?tipo=cirurgia&mes=" . $mes . "&ano=" . $ano . "\"><button id=\"btn\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>Gerar PDF </button></a>";
                            echo "</div>";
                            
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
