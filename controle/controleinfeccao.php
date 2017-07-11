<?php

include '../DAOs/InfeccaoDAO.php';
include '../DAOs/ConexaoDAO.php';
include '../modelo/class.infeccao.php';
$con = new ConexaoDAO();
session_start();
$infeccao = new infeccao();
$infeccaoDAO = new InfeccaoDAO();
$con->conexao();

if (isset($_POST["cirurgia1"]) && isset($_POST["id"])) {
    $inf = $_SESSION["objeto"];
    $infeccao = $inf;
    $infeccao->setCirurgia($_POST["cirurgia1"]);
    $infeccaoDAO->alterar_infeccao($inf, $_POST["id"]);
    include_once'../modelo/class.log.php';
    include_once'../DAOs/LogDAO.php';
    $_SESSION["msg"] = 2;
    $acao = "UP";
    $tipo = "INFECCAO";
    $date = date("Y-m-d");
    $log = new log();
    $logdao = new LogDAO();
    $log->setCod_user($_SESSION["coduser"]);
    $log->setAcao($acao);
    $log->setTipo($tipo);
    $log->setDate($date);
    $logdao->RegistrarLog($log);
    header('Location:../visao/verinfeccao.php');
} else {
    $id = $_GET["id"];
    $tipo = $_GET["tipo"];
    $cirurgia = $_GET["cirurgia"];
    if ($tipo == "excluir") {
        $infeccaoDAO->deletarInfeccaoid($id);
        include_once'../modelo/class.log.php';
        include_once'../DAOs/LogDAO.php';
        $acao = "DEL";
        $tipo = "INFECCAO";
        $date = date("Y-m-d");
        $log = new log();
        $logdao = new LogDAO();
        $log->setCod_user($_SESSION["coduser"]);
        $log->setAcao($acao);
        $log->setTipo($tipo);
        $log->setDate($date);
        $logdao->RegistrarLog($log);
        $_SESSION["msg"] = 1;
        header('Location:../visao/verinfeccao.php');
    } else if ($tipo == "alterar") {
        if ($cirurgia == "sim") {
            $infeccao1 = $infeccaoDAO->listatodosporcirurgia($id);
        } else if ($cirurgia == "nao") {
            $infeccao1 = $infeccaoDAO->listatodossemcirurgia($id);
        }
        $_SESSION["objeto"] = $infeccao1;
        header('Location:../visao/alterarinfeccao.php');
    } else {
        $infeccao->setBacteria($_POST["bact1"]);
        $infeccao->setCirurgia($_POST["cirurgia"]);
        $infeccao->setDatainfeccao($_POST["dataInfeccao1"]);
        $infeccao->setObito($_POST["obito1"]);
        $infeccao->setPaciente($_POST["same1"]);
        $infeccao->setPesoRN($_POST["peso"]);
        $infeccao->setTopografia($_POST["topografia1"]);
        $infeccao->setUnidade($_POST["unidade1"]);

        $infeccaoDAO->Inserir_Infeccao($infeccao);
        $_SESSION["msg"] = 1;
        include_once'../modelo/class.log.php';
        include_once'../DAOs/LogDAO.php';
        $acao = "ADD";
        $tipo = "INFECCAO";
        $date = date("Y-m-d");
        $log = new log();
        $logdao = new LogDAO();
        $log->setCod_user($_SESSION["coduser"]);
        $log->setAcao($acao);
        $log->setTipo($tipo);
        $log->setDate($date);
        $logdao->RegistrarLog($log);
        header('Location:../visao/cadastrarinfeccao.php');
    }
}
?>

