<?php
include '../DAOs/conexaoDAO.php';
include '../DAOs/PacienteDAO.php';
include '../DAOs/UnidadeDAO.php';
include '../DAOs/ProcedimentoDAO.php';
include '../DAOs/cirurgiaDAO.php';
include '../modelo/class.cirurgia.php';
include '../modelo/class.paciente.php';

include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"], 1);
$cirurgia = $_SESSION["objeto"];
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
        <script src="../js/jquery.maskedinput.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">

            jQuery(function () {
                $("#datacirurgia").mask("99/99/9999");

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
    <center>
        <div class="container">
            <div class=row>
                <div class="col-sm-21">
                    <h2>Alterar Cirurgia</h2>
                </div>
            </div>
    </center>
    <div class="row">
        <div class="col-sm-offset-3">
            <form class="form-horizontal" action="alterarcirurgia.php" method="post" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="same">Digite o Same</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="same" value="<?php echo $cirurgia["codpaciente"] ?>">
                        <span class="help-block"></span>
                    </div>
                </div>


                <?php
                $conexao = new ConexaoDAO();
                $unidade = new UnidadeDAO();
                $proc = new ProcedimentoDAO();
                $paciente = new PacienteDAO();
                $conexao->conexao();
                ?>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="unidade">Selecione a unidade</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="unidade">
                            <option value="<?php echo $cirurgia["unidade"] ?>"><?php echo $cirurgia["SiglaUnidade"] ?></option>
                            <option value=""></option>
                            <?php
                            $unidade->selectUnidade();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="procedimento">Selecione o procedimento/especialidade</label>
                    <div class="col-sm-5">          

                        <select class="form-control"   name="procedimento">
                            <option value="<?php echo $cirurgia["codprocedimento"] ?>"><?php echo $cirurgia["nomeespecialidade"] . "" . $cirurgia["nomeprocedimento"] ?></option>
                            <option value=""></option>
                            <?php
                            $proc->procedimento();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="dataCirurgia">Digite a data da Cirurgia</label>
                    <div class="col-sm-5">          
                        <input type="text" name="dataCirurgia" class="form-control" id="datacirurgia" value="<?php echo $paciente->formatar_data1($cirurgia["datacirurgia"]) ?>">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="proteses">Implantou proteses?</label>
                    <div class="col-sm-5">          
                        <select name="proteses" class="form-control">
                            <option value="<?php echo $cirurgia["proteses"] ?>"><?php echo $cirurgia["proteses"] ?></option>
                            <option value=""></option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Obito">Foi à obito?</label>
                    <div class="col-sm-5">          
                        <select name="Obito" class="form-control">
                            <<option value="<?php echo $cirurgia["obito"] ?>"><?php echo $cirurgia["obito"] ?></option>
                            <option value=""></option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tempo">Tempo da Cirurgia</label>
                    <div class="col-sm-5">          
                        <input type="text" name="tempo" class="form-control" value="<?php echo $cirurgia["tempo"] ?>">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="situacao">Situacao da Cirurgia</label>
                    <div class="col-sm-5">          
                        <select name="situacao" class="form-control">
                            <option value="<?php echo $cirurgia["situacao"] ?>"><?php echo $cirurgia["situacao"] ?></option>
                            <option value=""></option>
                            <option value="Limpa">Limpa </option>
                            <option value="Potencial Contaminada">Potencial Contaminada</option>
                            <option value="Contaminada">Contaminada</option>
                            <option value="Infeccionada">Infeccionada </option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-lg-offset-3">          
                        <input type="submit" name="cadastrar" class="btn btn-default btn-lg" value="Alterar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST["same"]) && isset($_POST["tempo"]) && isset($_POST["situacao"]) && isset($_POST["Obito"]) && isset($_POST["proteses"]) && isset($_POST["dataCirurgia"]) && isset($_POST["procedimento"]) && isset($_POST["unidade"]) && isset($_POST["same"])) {
        $cirurgiaDAO = new cirurgiaDAO();
        $cirurgia1 = new cirurgia();

        if ($paciente->Verifica_Paciente($_POST["same"]) > 0) {
            if ($paciente->Validardata($_POST["dataCirurgia"]) && is_numeric($_POST["tempo"])) {
                $cirurgia1->setDatacirurgia($paciente->formatar_data($_POST["dataCirurgia"]));
                $cirurgia1->setProteses($_POST["proteses"]);
                $cirurgia1->setTempo($_POST["tempo"]);
                $cirurgia1->setSituacao($_POST["situacao"]);
                $cirurgia1->setObito($_POST["Obito"]);
                $cirurgia1->setPaciente($_POST["same"]);
                $cirurgia1->setProcedimento($_POST["procedimento"]);
                $cirurgia1->setUnidade($_POST["unidade"]);
                $cirurgia1->setTempo($_POST["tempo"]);
                $cirurgia1->setSituacao($_POST["situacao"]);
                echo $cirurgia["codcirurgia"];
                if ($cirurgiaDAO->alterar_Cirurgia($cirurgia1, $cirurgia["codcirurgia"])) {
                    $_SESSSION["msg"] = 2;
                    include_once'../modelo/class.log.php';
                    include_once'../DAOs/LogDAO.php';
                    $acao = "UP";
                    $tipo = "CIRURGIA";
                    $date = date("Y-m-d");
                    $log = new log();
                    $logdao = new LogDAO();
                    $log->setCod_user($_SESSION["coduser"]);
                    $log->setAcao($acao);
                    $log->setTipo($tipo);
                    $log->setDate($date);
                    $logdao->RegistrarLog($log);
                    echo"<script>location.href=\"../visao/vercirurgia.php\"</script>";
                }
            } else {
                echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Data Invalida e/ou o valor do tempo esta irregular </div></div>";
            }
        } else {
            echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Paciente não cadastrado</div></div>";
        }
    }
    ?>

</div>
</body>
</html>