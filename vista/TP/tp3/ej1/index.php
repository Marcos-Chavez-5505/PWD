<?php
//include_once encabezado
?>

<form action="control/3/ej1" method="post">
    <label for="archivo">
        Ingrese un archivo .pdf o .doc <input type="file" name="archivo" id="archivo">
    </label>
</form>

<?php
$control = new ControlEJ1();
$mensaje = $control->veryfyFile();

echo $mensaje;
//include_once footer
?>