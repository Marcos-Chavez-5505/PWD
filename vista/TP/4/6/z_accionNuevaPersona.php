<?php
include_once '../../../../control/4/controlPersona.php';

$mensaje = "";
$tipoAlerta = "danger"; 

if ($_POST) {
    
    $dni       = $_POST['nroDni'] ?? '';
    $nombre    = $_POST['nombre'] ?? '';
    $apellido  = $_POST['apellido'] ?? '';
    $fechaNac  = $_POST['fechaNac'] ?? null;
    $telefono  = $_POST['telefono'] ?? '';
    $domicilio = $_POST['domicilio'] ?? '';

    $control = new ControlPersona();

    // Array con claves que espera ControlPersona
    $nuevaPersona = [
        'nroDni'    => $dni,
        'nombre'    => $nombre,
        'apellido'  => $apellido,
        'fechaNac'  => $fechaNac,
        'telefono'  => $telefono,
        'domicilio' => $domicilio
    ];

    // Insertamos la persona
    // Emojis apropositos, no me digan gpt
    $resultado = $control->insertarPersona($nuevaPersona);

    if ($resultado === 1) {
        $mensaje = "✅ Persona cargada correctamente.";
        $tipoAlerta = "success";
    } elseif ($resultado === -1) {
        $mensaje = "⚠️ Error: la persona ya existe en la base de datos.";
        $tipoAlerta = "warning";
    } else {
        $mensaje = "❌ Error inesperado.";
    }
} else {
    $mensaje = "⚠️ No se recibieron datos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Nueva Persona</title>

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
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body text-center">
                        <div class="alert alert-<?= $tipoAlerta ?> fw-bold fs-5">
                            <?= $mensaje ?>
                        </div>

                        <div class="mt-4">
                            <a href="NuevaPersona.php" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left-circle"></i> Volver
                            </a>
                            <br>
                            <br>
                            <a href="/PWD/vista/TP/4/5/listarPersonas.php" class="btn btn-primary">
                                <i class="bi bi-people-fill"></i> Ver listado de personas
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
