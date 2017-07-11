<?php
include_once "../controle/class.sessao.php";
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
$valida_sessao->validarsessao_tipo(1);
$user = $_SESSION["objeto"];
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
            <center>
                <div class=row>
                    <div class="col-sm-21">
                        <h2>Alterar Usuários</h2>
                    </div>
                </div>
            </center>
            <div class="row">
                <div class="col-sm-offset-3">
                    <form class="form-horizontal" action="alterarusuario.php" method="post" role="form">
                        <?php
                        if ($user["tipo"] == 1) {
                            ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="TipoLogin">Selecione o tipo do Login</label>
                                <div class="col-sm-5">
                                    <div class="radio-inline">
                                        <label><input type="radio" id="radio1" name="TipoLogin" value="1" checked>Administrador</label>

                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" id="radio2" name="TipoLogin" value="2">Usuario Normal</label>

                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="TipoLogin">Selecione o tipo do Login</label>
                                <div class="col-sm-5">
                                    <div class="radio-inline">
                                        <label><input type="radio" id="radio1" name="TipoLogin" value="1">Administrador</label>

                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" id="radio2" name="TipoLogin" value="2" checked>Usuario Normal</label>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="NomeUsuario">Nome do Usuário:</label>
                            <div class="col-sm-5">
                                <input type="type"  class="form-control" id="campos2" name="NomeUsuario" value="<?php echo $user["nome_usuario"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="NomeLogin">Nome do Login</label>
                            <div class="col-sm-5">          
                                <input type="text" class="form-control" id="campos3"  name="NomeLogin" value="<?php echo $user["nome_login"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Senha">Senha do Login</label>
                            <div class="col-sm-5">          
                                <input type="text" class="form-control" id="campos4"  name="Senha" value="<?php echo $user["senha"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Matricula">Matricula</label>
                            <div class="col-sm-5">          
                                <input type="text" class="form-control" id="campos5"  name="Matricula" value="<?php echo $user["matricula"] ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Funcao">Função</label>
                            <div class="col-sm-5">          
                                <select class="form-control"  id="selecao" name="Funcao">
                                    <option value="<?php echo $user["Funcao"] ?>" ><?php echo $user["Funcao"] ?></option>
                                    <option value=""></option>
                                    <option value="Bolsista">Bolsista</option>
                                    <option value="Funcionario">Funcionário</option>
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
include '../DAOs/UsuariosDAOs.php';
include '../modelo/class.usuario.php';
include '../DAOs/conexaoDAO.php';

if (isset($_POST["TipoLogin"]) && isset($_POST["NomeLogin"]) && isset($_POST["Senha"]) && isset($_POST["NomeUsuario"]) && isset($_POST["Matricula"]) && isset($_POST["Funcao"])) {

    $acao = new UsuariosDAOs();
    $Usuario = new usuario();
    $conexao = new ConexaoDAO();
    $conexao->conexao();
    $Usuario->setNomeLogin($_POST["NomeLogin"]);
    $Usuario->setMatricula($_POST["Matricula"]);
    $Usuario->setNomeUsuario($_POST["NomeUsuario"]);
    $Usuario->setSenha($_POST["Senha"]);
    $Usuario->setTipo($_POST["TipoLogin"]);
    $Usuario->setFuncao($_POST["Funcao"]);
    if ($_POST["Matricula"] == $user["matricula"]) {
        if ($acao->Verificar_Nome_Login_maisalgum($user["nome_login"], $_POST["NomeLogin"]) > 0) {
            echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span> Este nome de login já Possui em nosso cadastro, Por favor digite outro</div></div>";
        } else {
            if ($acao->alterar_usuario($Usuario, $user["cod_usuario"])) {
                $_SESSION["msg"] = 2;
                echo"<script>location.href=\"../visao/verusuario.php\"</script>";
            }
        }
    } else {
        if($acao->Validar_Matricula_alterar($_POST["Matricula"],$user["matricula"]) == 0 ) {
            if ($acao->Verificar_Nome_Login_maisalgum($user["nome_login"], $_POST["NomeLogin"]) > 0) {
                echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span> Este nome de login já Possui em nosso cadastro, Por favor digite outro</div></div>";
            } else {
                if ($acao->alterar_usuario($Usuario, $user["cod_usuario"])) {
                    $_SESSION["msg"] = 2;
                    echo"<script>location.href=\"../visao/verusuario.php\"</script>";
                }
            }
        }else{
            echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span> Esta Matricula Pertence a Outro Usuario</div></div>";
        }
    }
}
?>

