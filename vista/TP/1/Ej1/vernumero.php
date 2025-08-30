<?php
//incluimos a la clase
include_once "../control/claseVerNumero.php";

//creamos el objeto de la clase
$validador = new verNumero();

if($_POST){
    $numero = $_POST['numero'];
    $mensaje = $validador->validarNumero($numero);

    echo "El numero que ingresaste es: " . $mensaje;
}
?>
<br>
<a href="../vista/formulario1.php"></a>
