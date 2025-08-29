<?php
// include_once encabezado
include_once __DIR__ . "../../../../../control/3/controlEJ2.php";

$control = new controlEJ2();
$mensaje = $control->verifyFile();
echo $mensaje;

//include_once pie
?>