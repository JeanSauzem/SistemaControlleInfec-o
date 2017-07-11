<?php
session_start();
include '../DAOs/InfeccaoDAO.php';
include '../DAOs/BacteriaDAO.php';
include '../DAOs/ConexaoDAO.php';
$con = new ConexaoDAO();
$infDAO = new InfeccaoDAO();
$bacDAO = new BacteriaDAO();

$con->conexao();

$id=$_GET["id"];
$tipo=$_GET["tipo"];

if($tipo == "excluir"){
    $bacDAO->deletar_Bacteria($id);
    $infDAO->deletainfeccaobacteria($id);
    $_SESSION["msg"] = 1;
    header('Location:../visao/verbacteria.php');
}
if($tipo == "alterar"){
    $bac=$bacDAO->BuscaporidBacteria($id);
    $_SESSION["objeto"]=$bac;
    header('Location:../visao/alterarbacteria.php');
}

?>