<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Buscar Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>
    <main class="container py-5 my-5 d-flex justify-content-center">
        <div class="card p-4 shadow-sm w-100" style="max-width: 800px;">

            <div class="<?= $tipoAlerta ?>">
                <?= $mensaje ?>
            </div>

            <h3 class="text-center mb-4 <?= $esconder ?>">Información del auto solicitado:</h3>
            <div class="table-responsive <?= $esconder ?>">
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
                        <tr>
                            <td><?= htmlspecialchars($datosAuto['patente']) ?></td>
                            <td><?= htmlspecialchars($datosAuto['marca']) ?></td>
                            <td><?= htmlspecialchars($datosAuto['modelo']) ?></td>
                            <td><?= htmlspecialchars($datosAuto['nombre'] . ' ' . $datosAuto['apellido']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="/PWD/vista/TP/4/4/buscarAuto.php" class="btn btn-secondary m-2">Volver</a>
            </div>
        </div>
    </main>

</body>
</html>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/footer.php'; ?>
