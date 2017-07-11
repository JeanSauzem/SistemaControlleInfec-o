<?php

include '../DAOs/PacienteDAO.php';
include '../DAOs/cirurgiaDAO.php';
include '../DAOs/InfeccaoDAO.php';
include '../DAOs/ConexaoDAO.php';
session_start();
$paciente = new PacienteDAO();
$cirurgia = new cirurgiaDAO();
$infeccao = new InfeccaoDAO();

$con = new ConexaoDAO();
$con->conexao();
if ($_GET["tipo"] == "excluir") {
    $id = $_GET["id"];
    $same = $_GET["same"];
    
    if ($paciente->deletar_paciente($id) ) {
        $cirurgia->deletarcirurgiasame($same);
        $infeccao->deletarinfeccaosame($same);
        $_SESSION["msg"] = 1;
    }
    header('Location:../visao/verpaciente.php');
} else if ($_GET["tipo"] == "alterar") {
    $id = $_GET["id"];
    $same = $_GET["same"];

    $teste = $paciente->listar_pacienteporid($_GET["id"]);
    $_SESSION["objeto"]=$teste;
    header('Location:../visao/alterarpaciente.php');
    
}
?>
