<?php
include_once"../controle/class.sessao.php";
session_start();
$sair = new Sessao();
$sair->SairSessao();

?>
