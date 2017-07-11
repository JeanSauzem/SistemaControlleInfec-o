<?php

include '../DAOs/ConexaoDAO.php';
include '../DAOs/cirurgiaDAO.php';
session_start();
$id = $_GET["id"];
$tipo = $_GET["tipo"];
$con = new ConexaoDAO();
$cirurgia = new cirurgiaDAO();
$con->conexao();
if ($tipo == "excluir") {
    $cirurgia->deletarcirurgia($id);
    include_once'../modelo/class.log.php';
    include_once'../DAOs/LogDAO.php';
    $_SESSION["msg"] = 1;
    $acao = "DEL";
    $tipo = "CIRURGIA";
    $date = date("Y-m-d");
    $log = new log();
    $logdao = new LogDAO();
    $log->setCod_user($_SESSION["coduser"]);
    $log->setAcao($acao);
    $log->setTipo($tipo);
    $log->setDate($date);
    $logdao->RegistrarLog($log);
    header('Location:../visao/vercirurgia.php');
} else if ($tipo == "alterar") {
    $_SESSION["objeto"] = $cirurgia->listarcirurgiaporid($id);
    header('Location:../visao/alterarcirurgia.php');
}
?>