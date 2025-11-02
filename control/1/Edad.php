<?php
//creamos la clase
class Edad{

    //implementamos la funcion generarMensaje
    public function generarMensaje($edad){
        $mensaje = "";
        if($edad >= 18){
            $mensaje = "mayor de edad";
        }else{
            $mensaje = "menor de edad";
        }
        return $mensaje;
    }
}
?>