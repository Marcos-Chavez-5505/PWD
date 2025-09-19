<?php
include_once __DIR__ . '/control/controlPersona.php';
include_once __DIR__ . '/control/controlVehiculo.php'; // Supongamos que existe

if (!isset($_GET['dni'])) {
    die("DNI no recibido.");
}

$dni = $_GET['dni'];
$control = new ControlPersona();
$persona = $control->obtenerPersona($dni);

if (!$persona) {
    die("Persona no encontrada.");
}

// Obtener autos asociados
$controlVehiculo = new ControlVehiculo();
$autos = $controlVehiculo->listarAutosPorDni($dni); // suponemos este método
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autos de <?= $persona->getNombre() . " " . $persona->getApellido() ?></title>
</head>
<body>
    <h1>Datos de la Persona</h1>
    <p><strong>DNI:</strong> <?= $persona->getNroDni() ?></p>
    <p><strong>Nombre:</strong> <?= $persona->getNombre() ?></p>
    <p><strong>Apellido:</strong> <?= $persona->getApellido() ?></p>
    <p><strong>Teléfono:</strong> <?= $persona->getTelefono() ?></p>
    <p><strong>Domicilio:</strong> <?= $persona->getDomicilio() ?></p>

    <h2>Autos Asociados</h2>
    <?php if (count($autos) > 0): ?>
    <ul>
        <?php foreach ($autos as $a): ?>
        <li><?= $a['marca'] ?> <?= $a['modelo'] ?> (<?= $a['patente'] ?>)</li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>No tiene autos asociados.</p>
    <?php endif; ?>
</body>
</html>
