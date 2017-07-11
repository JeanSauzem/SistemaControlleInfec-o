<?php
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"], 1);
$bac = $_SESSION["objeto"];
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
                    <h2>Alterar de Bacteria</h2>
                </div>
            </div>
    </center>
    <div class="row">
        <div class="col-sm-offset-3">
            <form class="form-horizontal" action="alterarbacteria.php" method="post" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="NomeBacteria">Nome da Bacteria:</label>
                    <div class="col-sm-5">
                        <input type="type"  class="form-control" id="campos2" name="NomeBacteria" value="<?php echo $bac["nomebacteria"] ?>">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="TipoBacteria">Tipo de Bacteria</label>
                    <div class="col-sm-5">          
                        <select class="form-control"  id="selecao" name="TipoBacteria">
                            <option value="<?php echo $bac["tipobacteria"] ?>"><?php echo $bac["tipobacteria"] ?></option>
                            <option value=""></option>
                            <option value="Grand Positivos">Grand Positivos</option>
                            <option value="Grand Negativos">Grand Negativos</option>
                            <option value="Fungo">Fungo</option>
                            <option value="Virus">Virus</option>
                        </select>
                        <span class="help-block"></span>
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

</body>
</html>
<?php
include '../DAOs/BacteriaDAO.php';
include '../modelo/class.bacteria.php';
include '../DAOs/conexaoDAO.php';
$Bacteria = new bacteria();
$BacteriaDAO = new BacteriaDAO();
$conexao = new ConexaoDAO();
$conexao->conexao();
if (isset($_POST["TipoBacteria"]) && isset($_POST["NomeBacteria"])) {

    $Bacteria->setNomeBacteria($_POST["NomeBacteria"]);
    $Bacteria->setTipoBacteria($_POST["TipoBacteria"]);
    if ($BacteriaDAO->Altera_Bacteria($Bacteria, $bac["codbacteria"])) {
        $_SESSION["msg"] = 2;
        echo"<script>location.href=\"../visao/verbacteria.php\"</script>";
    }
}
?>