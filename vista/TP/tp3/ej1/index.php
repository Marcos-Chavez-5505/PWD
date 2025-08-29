<?php
//include_once encabezado
?>

<form action="mostrar.php" method="post" enctype="multipart/form-data">
    <label for="archivo">
        Ingrese un archivo .pdf o .doc <input type="file" name="archivo" id="archivo">
    </label>
    <button type="submit">Enviar</button>
</form>

<?php
$control = new ControlEJ1();
$mensaje = $control->veryfyFile();

echo $mensaje;
//include_once footer
?>