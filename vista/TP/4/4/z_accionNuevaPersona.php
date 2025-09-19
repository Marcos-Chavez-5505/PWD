<?php
include_once '../../../../control/4/controlPersona.php';

// TIRA UN ERROR DE QUE YA EXISTE PERO LO CREA IGUAL, DEPUES LO CORRIGO 😎

$mensaje = "";

if ($_POST) {
    // Tomamos los datos del formulario con null coalescing
    $dni       = $_POST['nroDni'] ?? '';
    $nombre    = $_POST['nombre'] ?? '';
    $apellido  = $_POST['apellido'] ?? '';
    $fechaNac  = $_POST['fechaNac'] ?? null;
    $telefono  = $_POST['telefono'] ?? '';
    $domicilio = $_POST['domicilio'] ?? '';

    $control = new ControlPersona();

    // Array con claves que espera ControlPersona
    $nuevaPersona = [
        'nroDni'    => $dni,
        'nombre'    => $nombre,
        'apellido'  => $apellido,
        'fechaNac'  => $fechaNac,
        'telefono'  => $telefono,
        'domicilio' => $domicilio
    ];

    // Insertamos la persona
    $resultado = $control->insertarPersona($nuevaPersona);

    if ($resultado > 0) {
        $mensaje = "Persona cargada correctamente (ID insertado: $resultado)";
    } elseif ($resultado == -1) {
        $mensaje = "Error: la persona ya existe en la base de datos.";
    } else {
        $mensaje = "Error: no se pudo cargar la persona.";
    }
} else {
    $mensaje = "No se recibieron datos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Nueva Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4"><?= $mensaje ?></h1>
        <a href="NuevaPersona.php" class="btn btn-secondary">Volver</a>
        <a href="../3/listarPersonas.php" class="btn btn-primary">Ver listado de personas</a>
    </div>
</body>
</html>
