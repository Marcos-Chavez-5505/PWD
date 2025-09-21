<?php
include_once '../../../estructura/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Duenio</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>

    <main class="container my-5 d-flex justify-content-center">
        <div class="card p-4 shadow-sm w-100" style="max-width: 500px;">
            <h3 class="text-center mb-4">Cambiar Dueño del Auto</h3>
            <form id="cambioDuenioForm" action="z_accionCambioDuenio.php" method="post">

                <div class="mb-3">
                    <label for="nroDni" class="form-label">DNI:</label>
                    <input type="text" name="dni" id="nroDni" class="form-control" required>
                    <div class="invalid-feedback">El DNI es obligatorio y debe ser un número.</div>
                </div>

                <div class="mb-3">
                    <label for="patente" class="form-label">Patente:</label>
                    <input type="text" name="patente" id="patente" class="form-control" required>
                    <div class="invalid-feedback">La patente es obligatoria.</div>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-check-circle"></i> Guardar
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once '../../../estructura/footer.php'; ?>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Archivo de validación externo -->
    <script src="./../../../js/validator.js" defer></script>
</body>
</html>
