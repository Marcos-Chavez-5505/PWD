<?php
// require_once __DIR__ . "../../../../configuracion.php";
// $control = new ControlAuto();
// $autos = $control->listarTodosLosAutos();
include_once __DIR__ . "../../action/formAccion_Tp4Ej3.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>

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

    <main class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">
                            <i class="bi bi-car-front-fill"></i> Listado de Autos
                        </h1>

                        <?php if (empty($autos)): ?>
                            <div class="alert alert-warning text-center">
                                ⚠️ No hay autos cargados.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Patente</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Dueño</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($autos as $auto): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($auto['Patente']) ?></td>
                                                <td><?= htmlspecialchars($auto['Marca']) ?></td>
                                                <td><?= htmlspecialchars($auto['Modelo']) ?></td>
                                                <td><?= htmlspecialchars($auto['nombre'] . ' ' . $auto['apellido']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <div class="text-center mt-4">
                            <a href="../../4/7/nuevoAuto.php" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Nuevo Auto
                            </a>
                        </div>

                    </div>
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
