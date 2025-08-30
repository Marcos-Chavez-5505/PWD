<?php
//creamos la clase verNumero
class verNumero{

    //creamos la funcion validarNumero
    public function validarNumero($num){
        //creamos la variable para guardar el mensaje
        $mensaje = "";
        if($num > 0){
            $mensaje = "positivo";
        }elseif($num == 0){
            $mensaje = "igual a 0!";
        }else{
            $mensaje = "negativo";
        }
        //retornamos la variable del mensaje
        return $mensaje;
    }
}
?>