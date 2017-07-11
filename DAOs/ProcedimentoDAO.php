<?php

class ProcedimentoDAO {
     function procedimento(){
         $sql="select * from procedimento";
         $query =mysql_query($sql);
            while($linha= mysql_fetch_array($query)){
                echo "<option value=".$linha["codprocedimento"].">".$linha["nomeprocedimento"] ."/".$linha["nomeespecialidade"]."</option>";
            }
     }
     function TotalNeuro($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Neurocirurgia' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalCabeçaepescoco($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Cabeça e pescoço' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function Totaltorácica($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Torácica' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function Totalcardio($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Cardíaca' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function Totalcirgeral($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Cirurgia Geral' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
    function TotalTraumato($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Traumato' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalUrologia($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Urologia' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalVascular($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Vascular' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalRenal ($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Transplante Renal' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalGinecologia ($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Ginecologia' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     function TotalCirurgiaPediatrica ($mes,$ano){
         $sql="select count(*) from cirurgia, procedimento"
                 . "where cirurgia.codprocedimento=procedimento.codprocedimento AND"
                 . "procedimento.nomeprocedimento='Cirurgia Pediatrica' AND"
                 . "Month(cirurgia.datacirurgia)=".$mes." AND"
                 . "Year(cirurgia.datacirurgia)=".$ano."";
         $query=mysql_query($sql);
         $linha=  mysql_fetch_array($query);
     }
     
}
