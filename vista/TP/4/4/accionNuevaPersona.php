<?php
include_once '../../../../control/4/controlPersona.php';

if ($_POST) {
    $dni = $_POST['nroDni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNac = $_POST['fechaNac'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];

    $control = new ControlPersona();
    $nuevaPersona = [
        'nroDni' => $dni,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'fechaNac' => $fechaNac,
        'telefono' => $telefono,
        'domicilio' => $domicilio
    ];

    $resultado = $control->insertarPersona($nuevaPersona);

    if ($resultado > 0) {
        $mensaje = "✅ Persona cargada correctamente (ID insertado: $resultado)";
    } else {
        $mensaje = "❌ Error: no se pudo cargar la persona.";
    }
} else {
    $mensaje = "⚠️ No se recibieron datos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Nueva Persona</title>
</head>
<body>
    <h1><?= $mensaje ?></h1>
    <a href="NuevaPersona.php">Volver</a>
    <br>
    <a href="listaPersonas.php">Ver listado de personas</a>
</body>
</html>
