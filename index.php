<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sessão de Logins</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validacaocampos.js"></script>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <center>
        <div class="container">
            <div class=row>
                <div class="col-sm-21">
                    <h2>SISTEMA DE CONTROLE DE INFECCÃO</h2>
                    <h3>Acesso Restrito</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-3">
                    <form class="form-horizontal" action="index.php" method="post" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Nome"><span class="glyphicon glyphicon-user"></span></label>
                            <div class="col-sm-5">
                                <input type="type"  class="form-control" id="campos" name="login" placeholder="Nome do Login">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="senha"><span class="glyphicon glyphicon-lock"></span></label>
                            <div class="col-sm-5">          
                                <input type="password" class="form-control" id="campos1"  name="senha" placeholder="Digite a senha">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-8">

                                <button type="submit" id="btnvalidar" class="btn btn-default btn-lg"  disabled="disabled"> Acessar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-0"></div>
            </div>
            <div class="row">
                <div class="col-sm-offset-0">
                    <img src="image/logo.jpg"  height="100" width="100" alt="CCIH" class="img-thumbnail">
                    <img src="image/Índice.jpg" height="100" width="100" alt="ESBERH" class="img-thumbnail">
                    <img src="image/Índice1.jpg" height="100" width="100" alt="HUSM" class="img-thumbnail">
                </div>
            </div>
            
        </div>
    </center>
</body>
</html>
<?php
session_start();

include_once "/DAOs/conexaoDAO.php";
include_once "/DAOs/UsuariosDAOs.php";
include_once "./modelo/class.usuario.php";

if (isset($_POST["login"]) || isset($_POST["senha"])) {
    $conexao = new ConexaoDAO();
    $Usuarios = new UsuariosDAOs();

    $conexao->conexao();

    $verifica_Usuario = $Usuarios->Verificar_usuario($_POST["login"], $_POST["senha"]);
    if ($verifica_Usuario == 0) {
        echo"<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>
Usuário Invalido
</div></div>";
    } else {
        $verifica_tipo = $Usuarios->Ver_tipo_usuario($_POST["login"], $_POST["senha"]);
        session_start();
        $_SESSION["usuario"] = $_POST["login"];
        $_SESSION["senha"] = $_POST["senha"];
        $_SESSION["coduser"] = $verifica_Usuario;
        $_SESSION["msg"] = 0;
        $_SESSION["tipo"]=$verifica_tipo;
        header("location:visao/visaoadministrador.php");
       
    }
}
?>