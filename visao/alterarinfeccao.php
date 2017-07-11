<?php
include_once "../controle/class.sessao.php";
include '../DAOs/PacienteDAO.php';
include '../DAOs/cirurgiaDAO.php';
session_start();
$valida_sessao = new Sessao();
$valida_sessao->validarsessao($_SESSION["usuario"], $_SESSION["senha"]);
$infeccao = $_SESSION["objeto"];
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
        <script src="../js/jquery.maskedinput.js"></script>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">

            jQuery(function () {
                $("#datainfecao").mask("99/99/9999");

            });
        </script>
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
    <center>
        <div class="container">
            <div class=row>
                <div class="col-sm-21">
                    <h2>Alterar Infecção</h2>
                </div>
            </div>
    </center>
    <div class="row">
        <div class="col-sm-offset-3">
            <form class="form-horizontal" action="alterarinfeccao.php" method="post" role="form">
                <?php
                include '../DAOs/BacteriaDAO.php';
                include '../DAOs/ConexaoDAO.php';
                include '../DAOs/UnidadeDAO.php';
                include '../DAOs/TopografiaDAO.php';
                $data = new PacienteDAO();
                $con = new ConexaoDAO();
                $cir = new cirurgiaDAO();
                $con->conexao();
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="same">Digite o Same</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="campos3"  name="same" value="<?php echo $infeccao["Same"] ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="topografia">Selecione a Topografia:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="topografia">
                            <option value ="<?php echo $infeccao["codtopografica"] ?> "> <?php echo $infeccao["tipotopografia"] ?></option>
                            <option value =" "></option>
                            <?php
                            $topo = new TopografiaDAO();
                            $topo->Select_Topografia();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="bacteria">Selecione a Bacteria:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="bacteria">
                            <option value="<?php echo $infeccao["codbacteria"] ?>"> <?php echo $infeccao["nomebacteria"] ?></option>
                            <option value=""> </option>
                            <?php
                            $bacteria = new BacteriaDAO();
                            $bacteria->Listar_Bacteria();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="unidade">Selecione a Unidade:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="unidade" name="unidade">
                            <option value="<?php echo $infeccao["codunidade"] ?>"><?php echo $infeccao["SiglaUnidade"] ?></option>
                            <option value=""></option>
                            <?php
                            $unidade = new UnidadeDAO();
                            $unidade->selectUnidade();
                            ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#palco > div").hide();

                        //mostrando no onload da página
                        $("#palco > div").hide();
                        $('#' + $("#unidade").val()).show('fast');

                        //mostrando ao mudar o select
                        $("#unidade").on('change', function () {
                            $("#palco > div").hide();
                            $('#' + $(this).val()).show('fast');
                        });
                    });
                </script>
                <div id="palco">
                    <div id="3">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="peso">Peso da UTI RN:</label>
                            <div class="col-sm-5" >
                                <select class="form-control"   name="peso">
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="dataInfeccao">Digite a data de infeccão</label>
                    <div class="col-sm-5">          
                        <input type="text" class="form-control" id="datainfecao"  name="dataInfeccao"  value="<?php echo $data->formatar_data1($infeccao["data_infeccao"]) ?>">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="obito">Foi à Obito:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="selecao" name="obito">
                            <option value="<?php echo $infeccao["obito"] ?>"><?php echo $infeccao["obito"] ?></option>
                            <option value=""></option>
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="cirurgia">Relacionando a cirurgia:</label>
                    <div class="col-sm-5">
                        <select class="form-control"  id="cirurgia" name="cirurgia">
                            <option value="SIM">SIM</option>
                            <option value="NAO">NÃO</option>
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
include '../DAOs/InfeccaoDAO.php';
include '../modelo/class.infeccao.php';
$infeccao1 = new infeccao();
$infeccaoDAO = new InfeccaoDAO();
$data = new PacienteDAO();
$cirurgia = new cirurgiaDAO();

if (isset($_POST["obito"]) && isset($_POST["cirurgia"]) && isset($_POST["dataInfeccao"]) && isset($_POST["unidade"]) && isset($_POST["bacteria"]) && isset($_POST["topografia"]) && isset($_POST["same"]) && isset($_POST["cirurgia"])) {

    if ($data->Verifica_Paciente($_POST["same"])) {
        if ($data->Validardata($_POST["dataInfeccao"])) {

            $infeccao1->setBacteria($_POST["bacteria"]);
            $infeccao1->setObito($_POST["obito"]);
            $infeccao1->setUnidade($_POST["unidade"]);
            $infeccao1->setTopografia($_POST["topografia"]);
            $infeccao1->setCirurgia(0);

            if ($_POST["unidade"] == 3) {
                $infeccao1->setPesoRN($_POST["peso"]);
            } else {
                $infeccao1->setPesoRN(0);
            }
            $infeccao1->setPaciente($_POST["same"]);
            $infeccao1->setDatainfeccao($data->formatar_data($_POST["dataInfeccao"]));

            if ($_POST["cirurgia"] == "NAO") {
                $infeccao1->setCirurgia(0);
                if ($infeccaoDAO->alterar_infeccao($infeccao1, $infeccao["codinfeccao"])) {
                    
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
                     echo"<script>location.href=\"../visao/verinfeccao.php\"</script>";
                }
            } else {
                ?>
                <div class="col-sm-offset-3">
                    <form class="form-horizontal" action="../controle/controleinfeccao.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $infeccao["codinfeccao"] ?>"
                               <div class="form-group">
                            <label class="control-label col-sm-2" for="cirurgia">Selecione a cirurgia:</label>
                            <div class="col-sm-5">
                                <select name="cirurgia1" class="form-control">
                                    <?php
                                    $cirurgia->listar_cirurgias($infeccao1->getPaciente());
                                    $_SESSION["objeto"] = $infeccao1;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">        
                            <div class="col-lg-offset-3">

                                <button type="submit" id="btnvalidar" class="btn btn-default btn-lg" > Relacionar a Infeccao</button>
                            </div>
                        </div>
                </div>
                </form>
                <?php
            }
        }
    }
}
?>

