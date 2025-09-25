    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Película introducida</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <!-- Header -->
        <?php include_once __DIR__ . "../../../../estructura/header.php"; ?>

        <main class="container mt-5 mb-5">
            <div class="container mt-4">
                <?php if (!$hayDatos): ?>
                    <div class="alert alert-warning">
                        <h2>No se recibieron datos del formulario.</h2>
                    </div>
                <?php elseif (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <h4>Errores en el formulario:</h4>
                        <ul>
                            <?php foreach ($errores as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="alert alert-success">
                        <h1 class="alert-heading text-primary">La película introducida es</h1>
                        <br>
                        <p>
                            <strong>Título:</strong> <?= htmlspecialchars($datos['titulo']) ?><br>
                            <strong>Actores:</strong> <?= htmlspecialchars($datos['actores']) ?><br>
                            <strong>Director:</strong> <?= htmlspecialchars($datos['director']) ?><br>
                            <strong>Guión:</strong> <?= htmlspecialchars($datos['guion']) ?><br>
                            <strong>Producción:</strong> <?= htmlspecialchars($datos['produccion']) ?><br>
                            <strong>Año:</strong> <?= htmlspecialchars($datos['anio']) ?><br>
                            <strong>Nacionalidad:</strong> <?= htmlspecialchars($datos['nacionalidad']) ?><br>
                            <strong>Género:</strong> <?= htmlspecialchars($datos['genero'] ?: 'No especificado') ?><br>
                            <strong>Duración:</strong> <?= htmlspecialchars($datos['duracion']) ?><br>
                            <strong>Restricciones de edad:</strong> <?= htmlspecialchars($datos['restriccion']) ?><br>
                            <strong>Sinopsis:</strong> <?= nl2br(htmlspecialchars($datos['sinopsis'])) ?>
                        </p>
                    </div>
                <?php endif; ?>

                <div class="text-end">
                    <a href="/PWD/vista/TP/2/4/formulario.php" class="btn btn-outline-primary">Volver al formulario</a>
                </div>
            </div>
        </main>            

        <!-- Footer -->
        <?php include_once __DIR__ . "../../../../estructura/footer.php"; ?>

    </body>
    </html>
