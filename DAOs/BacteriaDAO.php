<?php

class BacteriaDAO {

    function Inserir_Bacteria($Bacteria) {
        $sql = "INSERT INTO `bacteria` (`codbacteria`, `nomebacteria`, `tipobacteria`) VALUES (NULL, '" . $Bacteria->getNomeBacteria() . "','" . $Bacteria->getTipoBacteria() . "')";
        $query = mysql_query($sql);
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }
function Altera_Bacteria($bac,$id){
        $sql="update bacteria set nomebacteria = '".$bac->getNomeBacteria()." ', tipobacteria ='".$bac->getTipoBacteria() ."'  where codbacteria=".$id."";
        $query=mysql_query($sql);
        return $query;
    }

    function Listar_Bacteria() {
        $sql = "select * from bacteria";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<option value='" . $linha["codbacteria"] . "'>" . $linha["nomebacteria"] . "</option>";
        }
    }
    function validarpesquisaBac($nome){
        $sql="select * from bacteria where nomebacteria like '%".$nome."%'";
         $query=mysql_query($sql);
        return $query;
    }
    function listatodostabelapesqbac($nome) {
        $sql="select * from bacteria where nomebacteria like '%".$nome."%'";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_assoc($query)) {
            echo "<tr><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipobacteria"] . "</td><td><a href=\"../controle/controlebacteria.php?tipo=excluir&id=" . $linha["codbacteria"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlebacteria.php?tipo=alterar&id=" . $linha["codbacteria"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }
    function listatodostabela() {
        $sql = "select * from bacteria";
        $query = mysql_query($sql);
        while ($linha = mysql_fetch_array($query)) {
            echo "<tr><td>" . $linha["nomebacteria"] . "</td><td>" . $linha["tipobacteria"] . "</td><td><a href=\"../controle/controlebacteria.php?tipo=excluir&id=" . $linha["codbacteria"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-trash\"></span></button></a><a href=\"../controle/controlebacteria.php?tipo=alterar&id=" . $linha["codbacteria"] . "\"><button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-refresh\"></span></button></a></td></tr>";
        }
    }
    
    function deletar_Bacteria($id){
        $sql="delete from bacteria where codbacteria=".$id."";
        $query=mysql_query($sql);
        return $query;
        
    }
    function BuscaporidBacteria($id){
        $sql="select * from bacteria where codbacteria=".$id."";
        $query=mysql_query($sql);
        $linha=mysql_fetch_array($query);
        return $linha;
    }
    
}
?>

