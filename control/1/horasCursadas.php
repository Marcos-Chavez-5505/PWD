<?php
//creamos la clase
class horasCursadas{
    
    //recibe el arreglo con las horas cursadas
    function sumarHoras($horas){
        $totalHoras = 0;
        foreach($horas as $hora){
            $totalHoras += (int)$hora;
        }

        return $totalHoras;
    }
}
?>