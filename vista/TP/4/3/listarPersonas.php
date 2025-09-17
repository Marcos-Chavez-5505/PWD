<?php
include_once '../../../../control/4/controlPersona.php';

$control = new ControlPersona();
$personas = $control->listarPersonas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>

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

    <main class="container meudeus">
        
        <div>
            <div>
                <div>
                    <h1>Personas Cargadas</h1>
                    <table class="table table-striped table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($personas)): ?>
                                <?php foreach ($personas as $p): ?>
                                    <tr>
                                        <td><?= $p['nroDni'] ?></td>
                                        <td><?= $p['nombre'] ?></td>
                                        <td><?= $p['apellido'] ?></td>
                                        <td>
                                            <a href="autosPersona.php?dni=<?= $p['nroDni'] ?>" class="btn btn-primary btn-sm">
                                                <i class="bi bi-car-front"></i> Ver Autos
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No hay personas cargadas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="../../4/4/nuevaPersona.php" class="btn btn-success">
                        <i class="bi bi-person-plus-fill"></i> Nueva Persona
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
