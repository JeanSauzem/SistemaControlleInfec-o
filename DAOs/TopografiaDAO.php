<?php


class TopografiaDAO {
   function Select_Topografia(){
       $sql="SELECT `codtopografica`,`tipotopografia` FROM `topografia`";
       $query= mysql_query($sql);
        while($linha=  mysql_fetch_array($query)){
            echo "<option value='".$linha["codtopografica"]."'>".$linha["tipotopografia"]."</option>";
        }
   }
}
