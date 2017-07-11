<?php
include_once "../controle/class.sessao.php";
include_once '../DAOs/ConexaoDAO.php';
include_once '../DAOs/UnidadeDAO.php';
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
    <center>
        <div class="container">
            <div class=row>
                <div class="col-sm-21">
                    <h2>Cadastro dos Dados Estatisticos</h2>
                </div>
            </div>
    </center>
    <div class="row">
        <div class="col-sm-offset-3">
            <form class="form-horizontal" action="cadastrardados.php" method="post" role="form">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="mes">Selecione o mês:</label>
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
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Ano">Selecione o Ano:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="Ano">
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
                <!--Unidade em php pegar no Banco-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Unidade">Selecione a Unidade</label>
                    <div class="col-sm-5">          
                        <select name="unidade" class="form-control">
                            <?php
                            $conexao = new ConexaoDAO();
                            $unidade = new UnidadeDAO();
                            $conexao->conexao();
                            $unidade->selectUnidade();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Pacientedia">Paciente Dia</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="Paciente" placeholder="Digite o Paciente dia">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="saidas">Saidas</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="Saida" placeholder="Digite o total de saida">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="obito">Óbitos</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="obito" placeholder="Digite o Total de Óbito">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="taxa">Taxa de Ocupação</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="taxa" placeholder="Digite a taxa de Ocupação">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="indice">Indice Global</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="indice" placeholder="Digite o Indice">
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
        include '../DAOs/EstatisticaDAO.php';
        include '../modelo/class.estatisticas.php';

        if (isset($_POST["indice"]) && isset($_POST["taxa"]) && isset($_POST["obito"]) && isset($_POST["Saida"]) && isset($_POST["Paciente"]) && isset($_POST["unidade"]) && isset($_POST["Ano"]) && isset($_POST["mes"])) {
            if (is_numeric($_POST["indice"]) && is_numeric($_POST["taxa"]) && is_numeric($_POST["obito"]) && is_numeric($_POST["Saida"]) && is_numeric($_POST["Paciente"])) {
                $estatisticas = new estatisca();
                $estatisticasDAO = new EstatisticaDAO();
                $estatisticas->setAno($_POST["Ano"]);
                $estatisticas->setIndice($_POST["indice"]);
                $estatisticas->setMes($_POST["mes"]);
                $estatisticas->setObitos($_POST["obito"]);
                $estatisticas->setPaciente_dia($_POST["Paciente"]);
                $estatisticas->setSaidas($_POST["Saida"]);
                $estatisticas->setTaxaocupacao($_POST["taxa"]);
                $estatisticas->setUnidade($_POST["unidade"]);

                if ($estatisticasDAO->validar_estatisca($estatisticas) > 0) {
                    echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span> Este Censo Estatistico ja foi Cadastrado</div></div>";
                } else {
                    if ($estatisticasDAO->inserir_estatisca($estatisticas) == 1) {
                        echo"<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Censo Estatistico  cadastrado com sucesso</div></div>";
                    }
                }
            } else {
                echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>Valores não são numeros</div></div>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
