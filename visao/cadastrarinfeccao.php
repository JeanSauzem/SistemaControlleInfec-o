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
        <script type="text/javascript">

            jQuery(function () {
                $("#num").mask("99/99/9999");

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
                    <h2>Cadastro de Infecção</h2>
                </div>
            </div>
    </center>
    <div class="row">
        <div class="col-sm-offset-3">
            <form class="form-horizontal" action="cadastrarinfeccao.php" method="post" role="form">
                <?php
                include '../DAOs/BacteriaDAO.php';
                include '../DAOs/ConexaoDAO.php';
                include '../DAOs/UnidadeDAO.php';
                include '../DAOs/TopografiaDAO.php';

                $con = new ConexaoDAO();
                $con->conexao();
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="same">Digite o Same</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="same" placeholder="Digite o Same">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="topografia">Selecione a Topografia:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="topografia">
                            <?php
                            $topo = new TopografiaDAO();
                            $topo->Select_Topografia();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="bacteria">Selecione a Bacteria:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="bacteria">
                            <?php
                            $bacteria = new BacteriaDAO();
                            $bacteria->Listar_Bacteria();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="unidade">Selecione a Unidade:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="unidade" name="unidade">
                            <?php
                            $unidade = new UnidadeDAO();
                            $unidade->selectUnidade();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#palco > div").hide();

                        //mostrando no onload da página
                        $("#palco > div").hide();
                        $('#' + $("#unidade").val()).show('fast');

                        //mostrando ao mudar o select
                        $("#unidade").on('change', function () {
                            $("#palco > div").hide();
                            $('#' + $(this).val()).show('fast');
                        });
                    });
                </script>
                <div id="palco">
                    <div id="3">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peso">Peso da UTI RN:</label>
                            <div class="col-sm-5" >
                                <select class="form-control"   name="peso">
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="dataInfeccao">Digite a data de infeccão</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="datainfecao"  name="dataInfeccao" >
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="obito">Foi à Obito:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="obito">
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cirurgia">Relacionando a cirurgia:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="cirurgia">
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">        
                    <div class="col-sm-offset-3">

                        <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" > Cadastrar</button>
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
        include '../modelo/class.infeccao.php';
        include '../DAOs/PacienteDAO.php';
        include '../DAOs/cirurgiaDAO.php';
        $infeccao = new infeccao();
        $infeccaoDAO = new InfeccaoDAO();
        $data = new PacienteDAO();
        $cirurgia = new cirurgiaDAO();
        if (isset($_POST["obito"]) && isset($_POST["cirurgia"]) && isset($_POST["dataInfeccao"]) && isset($_POST["unidade"]) && isset($_POST["bacteria"]) && isset($_POST["topografia"]) && isset($_POST["same"]) && isset($_POST["cirurgia"])) {
            if ($data->Verifica_Paciente($_POST["same"])) {
                if ($data->Validardata($_POST["dataInfeccao"])) {
                    if ($_POST["cirurgia"] == "NAO") {
                        $infeccao->setBacteria($_POST["bacteria"]);
                        $infeccao->setObito($_POST["obito"]);
                        $infeccao->setUnidade($_POST["unidade"]);
                        $infeccao->setTopografia($_POST["topografia"]);
                        $infeccao->setCirurgia(0);
                        $infeccao->setPaciente($_POST["same"]);
                        $infeccao->setDatainfeccao($data->formatar_data($_POST["dataInfeccao"]));
                        if ($_POST["unidade"] == 3) {
                            $infeccao->setPesoRN($_POST["peso"]);
                        } else {
                            $infeccao->setPesoRN(0);
                        }
                        if ($infeccaoDAO->Inserir_Infeccao($infeccao)) {
                            echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Infeccão Cadastrada com sucesso</div></div>";
                            include_once'../modelo/class.log.php';
                            include_once'../DAOs/LogDAO.php';
                            $acao = "ADD";
                            $tipo = "INFECCAO";
                            $date = date("Y-m-d");
                            $log = new log();
                            $logdao = new LogDAO();
                            $log->setCod_user($_SESSION["coduser"]);
                            $log->setAcao($acao);
                            $log->setTipo($tipo);
                            $log->setDate($date);
                            $logdao->RegistrarLog($log);
                        }
                    } else {
                        if ($cirurgia->Verificar_cirurgias($_POST["same"]) > 0) {
                            ?>
                            <form class="form-horizontal" action="../controle/controleinfeccao.php" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cirurgia">Selecione a cirurgia:</label>
                                    <div class="col-sm-7">
                                        <?php
                                        if ($_POST["unidade"] == 3) {
                                            echo "<input type=\"hidden\" name=\"peso\" value=" . $_POST["peso"] . ">";
                                        } else {
                                            echo "<input type=\"hidden\" name=\"peso\" value=\"0\">";
                                        }
                                        ?>

                                        <input type="hidden" name="obito1" value="<?php echo $_POST["obito"] ?>">
                                        <input type="hidden" name="unidade1" value="<?php echo $_POST["unidade"] ?>">
                                        <input type="hidden" name="topografia1" value="<?php echo $_POST["topografia"] ?>">
                                        <input type="hidden" name="same1" value="<?php echo $_POST["same"] ?>">
                                        <input type="hidden" name="bact1" value="<?php echo $_POST["bacteria"] ?>">
                                        <input type="hidden" name="dataInfeccao1" value="<?php echo $data->formatar_data($_POST["dataInfeccao"]) ?>">
                                        <select class="form-control" name="cirurgia">
                                            <?php
                                            $cirurgia->listar_cirurgias($_POST["same"]);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-8">

                                        <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" >Adicionar Cirurgia</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Paciente não possui cirurgia cadastradas</div></div>";
                        }
                    }
                } else {
                    echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Data está Invalida</div></div>";
                }
            } else {
                echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Paciente não cadastrado</div></div>";
            }
        }
        if ($_SESSION["msg"] != 0) {
            echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Infeccão Cadastrada com sucesso</div></div>";
            $_SESSION["msg"] = 0;
        }
        ?>
    </div>
</div>

</body>
</html>