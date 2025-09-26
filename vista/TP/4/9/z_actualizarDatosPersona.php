<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Actualizar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>
<main class="container py-5 my-5 d-flex justify-content-center">
    <div class="card p-4 shadow-sm w-100" style="max-width: 800px;">
        <div class="alert alert-<?= $tipoAlerta ?> fw-bold fs-5 text-center">
            <?= $mensaje ?>
        </div>
        <div class="text-center mt-4">
            <a href="/PWD/vista/TP/4/9/buscarPersona.php" class="btn btn-secondary m-2">Volver</a>
        </div>
        <div class="text-center mt-4">
            <a href="/PWD/vista/TP/4/5/listarPersonas.php" class="btn btn-primary"><i class="bi bi-people-fill"></i> Ver listado de personas</a>
        </div>
    </div>
</main>
</body>
</html>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/footer.php'; ?>
