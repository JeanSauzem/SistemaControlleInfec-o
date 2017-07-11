<?php
session_start();
include '../DAOs/EstatisticaDAO.php';
include '../DAOs/ConexaoDAO.php';

$con = new ConexaoDAO();
$est = new EstatisticaDAO();
$con->conexao();

$id=$_GET["id"];
$tipo=$_GET["tipo"];

if($tipo == "excluir"){
    $est->deletar_estatisca($id);
    $_SESSION["msg"] = 1;
    header('Location:../visao/verdados.php');
}else if($tipo == "alterar"){
    $estatistica=$est->buscartodosporid($id);
    $_SESSION["objeto"]=$estatistica;
    header('Location:../visao/alterarestatistica.php');
}
?>

