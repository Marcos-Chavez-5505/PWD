<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Persona</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>

    <main class="container my-5 d-flex justify-content-center">
        <div class="card my-5 p-4 shadow-sm w-100" style="max-width: 500px;">
            <h3 class="text-center mb-4">Cargar Nueva Persona</h3>
            <form id="personaForm" action="../action/formAccion_Tp4Ej6.php" method="post" novalidate>
                <div class="mb-3">
                    <label for="nroDni" class="form-label">DNI:</label>
                    <input type="text" name="nroDni" id="nroDni" class="form-control" required>
                    <div class="invalid-feedback">El DNI es obligatorio y debe ser un número.</div>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                    <div class="invalid-feedback">El nombre es obligatorio.</div>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                    <div class="invalid-feedback">El apellido es obligatorio.</div>
                </div>

                <div class="mb-3">
                    <label for="fechaNac" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNac" id="fechaNac" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="domicilio" class="form-label">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control">
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
    <script src="../../../js/validarPersona.js"></script>
</body>
</html>
