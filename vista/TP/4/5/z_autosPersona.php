<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlAuto.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlPersona.php';

$valorRecibido = new ValorEncapsulado();
$dni = $valorRecibido->obtenerValor('dni');

if (!$dni) {
    die("DNI no recibido.");
}

$control = new ControlPersona();
$persona = $control->obtenerPersona($dni);

if (!$persona) {
    die("Persona no encontrada.");
}

// Obtener autos asociados
$controlAuto = new ControlAuto();
$autos = $controlAuto->listarAutosPorDni($dni); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos de <?= $persona->getNombre() . " " . $persona->getApellido() ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../css/tp4.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <?php include_once '../../../estructura/header.php'; ?>

    <main class="container py-5">
        <div class="card shadow-lg rounded-3">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">
                    Datos de <?= $persona->getNombre() . " " . $persona->getApellido() ?>
                </h1>

                <div class="mb-4">
                    <p><strong>DNI:</strong> <?= $persona->getNroDni() ?></p>
                    <p><strong>Nombre:</strong> <?= $persona->getNombre() ?></p>
                    <p><strong>Apellido:</strong> <?= $persona->getApellido() ?></p>
                    <p><strong>Teléfono:</strong> <?= $persona->getTelefono() ?></p>
                    <p><strong>Domicilio:</strong> <?= $persona->getDomicilio() ?></p>
                </div>

                <h2 class="mb-3">Autos Asociados</h2>
                <?php if (count($autos) > 0): ?>
                    <table class="table table-striped table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($autos as $a): ?>
                                <tr>
                                    <td><?= $a['Patente'] ?></td>
                                    <td><?= $a['Marca'] ?></td>
                                    <td><?= $a['Modelo'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">No tiene autos asociados.</p>
                <?php endif; ?>

                <div class="mt-4 text-center">
                    <a href="listarPersonas.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../../estructura/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
