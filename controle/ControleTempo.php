<?php

class Tempo{
    
    function Descreve_Mes($num){
        $mes;
        
        if($num==1){
            $mes="Janeiro";
        }else if($num==2){
            $mes="Fevereiro";
        }else if($num==3){
            $mes="Marco";
        }else if($num==4){
            $mes="Abril";
        }else if($num==5){
            $mes="Maio";
        }else if($num==6){
            $mes="Junho";
        }else if($num==7){
            $mes="Julho";
        }else if($num==8){
            $mes="Agosto";
        }else if($num==9){
            $mes="Setembro";
        }else if($num==10){
            $mes="Outubro";
        }else if($num==11){
            $mes="Novembro";
        }else if($num==12){
            $mes="Dezembro";
        }
        return $mes;
    }
}



?>