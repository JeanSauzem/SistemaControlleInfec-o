<?php
session_start();
include'../DAOs/ConexaoDAO.php';
include'../DAOs/DenominadoresDAO.php';
include'../modelo/class.denominadores.php';

$con= new ConexaoDAO();
$den = new denominador();
$denDAO= new DenominadoresDAO();
$con->conexao();

$id=$_GET["id"];
$tipo=$_GET["tipo"];

if($tipo=="excluir"){
    $denDAO->deletar_denominadores($id);
    $_SESSION["msg"] = 1;
    header('Location:../visao/verdenominador.php');
}else if($tipo=="alterar"){
    $den=$denDAO->listaporiddenominadores($id);
    $_SESSION["objeto"]=$den;
    header('Location:../visao/alterardenominador.php');
}
  

?>

