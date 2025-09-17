<?php
include_once '../../../../control/4/controlPersona.php';
include_once '../../../../control/3/controlEJ1.php';

$control = new ControlPersona();
$personas = $control->listarPersonas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
</head>
<body>
    <h1>Personas Cargadas</h1>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $p): ?>
            <tr>
                <td><?= $p['nroDni'] ?></td>
                <td><?= $p['nombre'] ?></td>
                <td><?= $p['apellido'] ?></td>
                <td><a href="autosPersona.php?dni=<?= $p['nroDni'] ?>">Ver Autos</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
