<?php
//creamos la clase
class Operaciones{
     
    //creamos la funcion, operacion
    public function operacion($operacion, $num1, $num2){
        $resultado = 0;
        $mensaje = "";
        if($operacion == "suma"){
            $resultado = $num1 + $num2;

        }elseif($operacion == "resta"){
            $resultado = $num1 - $num2;

        }elseif($operacion == "multiplicacion"){
            $resultado = $num1 * $num2;

        }
        return $resultado;
    }
}
?>