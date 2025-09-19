<?php
include_once __DIR__ . "../../../control/valorEncapsulado.php";

$encapsulamiento = new ValorEncapsulado; //usen esto para agarrar los campos

$accion = $encapsulamiento->obtenerValor('accion');

switch ($accion){
    //TP3
    case 'subirPdfDoc':
        include_once __DIR__ . "../../../control/3/controlEJ1.php";
        $controlEJ1 = new ControlEJ1;
        $mensaje = $controlEJ1->veryfyFile();
        include_once __DIR__ . "../../TP/3/1/mostrar.php";
        break;
    default:
        $mensaje = "no se han encontrado datos";
}
?>