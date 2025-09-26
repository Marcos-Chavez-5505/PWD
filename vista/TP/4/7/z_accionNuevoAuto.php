<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Nuevo Auto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../css/tp4.css">
</head>
<body>

    <!-- Header -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body text-center">
                        <div class="alert alert-<?= $tipoAlerta ?> fw-bold fs-5">
                            <?= $mensaje ?>
                        </div>

                        <div class="mt-4">
                            <?php if ($tipoAlerta === "danger" && str_contains($mensaje, "no existe")): ?>
                                <a href="../4/nuevaPersona.php" class="btn btn-warning">
                                    <i class="bi bi-person-plus-fill"></i> Cargar Nueva Persona
                                </a>
                            <?php endif; ?>

                            <a href="/PWD/vista/TP/4/7/nuevoAuto.php" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left-circle"></i> Volver
                            </a>
                            <br><br>
                            <a href="/PWD/vista/TP/4/3/VerAutos.php" class="btn btn-primary">
                                <i class="bi bi-people-fill"></i> Ver Autos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
