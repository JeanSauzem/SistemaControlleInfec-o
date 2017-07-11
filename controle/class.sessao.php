<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author JeanLocha
 */
class Sessao {

    function validarsessao($login, $senha) {
        
        if (!isset($_SESSION["usuario"]) && !isset($_SESSION["senha"])) {
            
            header("location:../index.php");
        }
    }   
     function validarsessao_tipo($num) {
        
        if ($num!=$_SESSION["tipo"]) {
            
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
    function SairSessao() {
        
        session_destroy();
        unset($_SESSION["usuario"]);
//        session_unregister('usuario');
//        session_unregister('senha');
     unset($_SESSION["senha"]);
     unset($_SESSION["tipo"]);
        header("location:../index.php");
    }

}
