<?php
//creamos la clase
class entradaCine{

    //implementamos la funcion para calcular el precio
    public function calcularPrecio($edad, $estudiante){
        $precio = 300;//precio valor por defecto del boleto

        if($estudiante == "si" && $edad < 12){
            $precio = 100;
        }elseif($estudiante == "si" && $edad >= 12){
            $precio = 180;
        }elseif($estudiante == "no" && $edad < 12){
            $precio = 160;
        }
        return $precio;
    }
}

?>