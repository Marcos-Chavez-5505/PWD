<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>

    <main class="container py-5 my-5 d-flex justify-content-center">
        <div class="card p-4 shadow-sm w-100" style="max-width: 500px;">
            <h3 class="text-center mb-4">Buscar un Auto:</h3>
            <form id="patenteForm" action="/PWD/vista/action/action.php" method="post" novalidate>
                <input type="text" hidden name="accion" value="buscarAuto">

                <div class="mb-3">
                    <label for="patente" class="form-label">Patente:</label>
                    <input type="text" name="patente" id="patente" class="form-control" required>
                    <div class="invalid-feedback">La patente es obligatoria, con formato ABC123.</div>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-check-circle"></i> Guardar
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/footer.php'; ?>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Archivo de validación externo -->
    <script src="./../../../js/validator.js" defer></script>
</body>
</html>
