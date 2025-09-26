<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlPersona.php';

// Listamos todas las personas para elegir dueño
$controlPersona = new ControlPersona();
$personas = $controlPersona->listarPersonas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Auto</title>

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
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg rounded-3 mx-auto" style="max-width: 900px;">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">
                            <i class="bi bi-car-front-fill"></i> Nuevo Auto
                        </h1>

                        <?php if (empty($personas)): ?>
                            <div class="alert alert-warning text-center">
                                ⚠️ No hay personas cargadas. 
                                <a href="../../4/4/nuevaPersona.php" class="alert-link">Cargar nueva persona</a>
                            </div>
                        <?php else: ?>
                            <form id="autoForm" action="/PWD/vista/action/action.php" method="POST" novalidate>
                                <input type="text" hidden name="accion" value="nuevoAuto">
                                <div class="mb-3">
                                    <label for="patente" class="form-label">Patente</label>
                                    <input type="text" class="form-control" id="patente" name="patente" required>
                                    <div class="invalid-feedback">Ingrese una patente válida (formato ABC123).</div>
                                </div>

                                <div class="mb-3">
                                    <label for="marca" class="form-label">Marca</label>
                                    <input type="text" class="form-control" id="marca" name="marca" required>
                                    <div class="invalid-feedback">La marca es obligatoria.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="modelo" class="form-label">Modelo</label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                                    <div class="invalid-feedback">El modelo es obligatorio.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="dniDuenio" class="form-label">Dueño</label>
                                    <select class="form-select" id="dniDuenio" name="dniDuenio" required>
                                        <option value="">Seleccione un dueño...</option>
                                        <?php foreach ($personas as $p): ?>
                                            <option value="<?= $p['NroDni'] ?>">
                                                <?= $p['Nombre'] . " " . $p['Apellido'] . " (DNI: " . $p['NroDni'] . ")" ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar un dueño.</div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Guardar Auto
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>

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
    <script src="../../../js/validator.js"></script>
</body>
</html>
