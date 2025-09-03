<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php
include_once '../../../estructura/header.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$nivelEstudio = $_POST['nivelEstudio'];
$genero = $_POST['opcion'];
?>
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h3 class="mb-3 text-center">Datos recibidos</h3>

        <p class="lead">
            Hola, yo soy <strong><?= htmlspecialchars($nombre) ?></strong> 
            <strong><?= htmlspecialchars($apellido) ?></strong>, 
            tengo <strong><?= htmlspecialchars($edad) ?></strong> años, 
            vivo en <strong><?= htmlspecialchars($direccion) ?></strong>, 
            mi nivel de estudio es <strong><?= htmlspecialchars($nivelEstudio) ?></strong> 
            y mi género es <strong><?= htmlspecialchars($genero) ?></strong>.
        </p>

        <div class="d-grid">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Formulario
            </a>
        </div>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php';
?>