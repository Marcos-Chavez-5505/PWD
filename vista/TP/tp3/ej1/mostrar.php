<?php

include_once '../../../../control/3/controlEJ1.php';
//include_once encabezado
if ($_FILES) {
    $control = new ControlEJ1();
    $mensaje = $control->veryfyFile();

    echo $mensaje;
}

//include_once footer
?>