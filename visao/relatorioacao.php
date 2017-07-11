<?php
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
$valida_sessao->validarsessao_tipo(1);
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
        <?php
        include '../DAOs/UsuariosDAOs.php';
        include '../DAOs/LogDAO.php';
        include '../DAOs/ConexaoDAO.php';
        $user = new UsuariosDAOs();
        $con = new ConexaoDAO();
        $log = new LogDAO();
        ?>

        <div class="row">
            <div class="col-sm-offset-4"><h2>Relatório das Ações</h2></div>
            <div class="col-sm-offset-3">
                <form class="form-horizontal" action="relatorioacao.php" method="post" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="usuario">Nome do Usuario:</label>
                        <div class="col-sm-5">
                            <select name="usuario" class="form-control">
                                <?php
                                $con->conexao();
                                $user->Select_lista_usuario();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mes">Selecione o mês:</label>
                        <div class="col-sm-5">
                            <select name="mes" class="form-control">
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Merço</option>
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
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-3">

                            <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" >Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div clas="row">
            <div class="col-sm-offset-3">
                <div class="col-sm-7">
                    <?php
                    if (isset($_POST["usuario"]) && isset($_POST["ano"]) && isset($_POST["mes"])) {
                        $id = $_POST["usuario"];
                        $mes = $_POST["mes"];
                        $ano = $_POST["ano"];
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
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                                                <span class="text-success">Ações nas Infeccão </span>
                                            </a>

                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
                            <div class="col-sm-offset-3">
                                <?php
                                echo "<a href=\"#\" onclick=\"window.print();\"><button id=\"btn\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>Imprimir </button></a>";
                                echo" <a href=\"../controle/ControlePdf.php?tipo=acoes&usuario=" . $id . "&mes=" . $mes . "&ano=" . $ano . "\"><button id=\"btn\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>Gerar PDF</button></a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>