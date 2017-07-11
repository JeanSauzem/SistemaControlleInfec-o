<?php
session_start();
include '../DAOs/ConexaoDAO.php';
include '../DAOs/UsuariosDAOs.php';
include '../DAOs/LogDAO.php';
$con = new ConexaoDAO();
$usu = new UsuariosDAOs();
$log = new LogDAO(); 
$con->conexao();

$id=$_GET["id"];
$tipo=$_GET["tipo"];

if($tipo=="excluir"){
    if($id!=$_SESSION["coduser"]){
        $_SESSION["msg"] = 1;
        $log->deletar_log($id);
        $usu->deletar_usuario($id);
    }else{
        $_SESSION["msg"] = 3;
    }
    header('Location:../visao/verusuario.php');
}else if($tipo=="alterar"){
    $user=$usu->buscaridusuario($id);
    $_SESSION["objeto"]=$user;
    header('Location:../visao/alterarusuario.php');
}



?>