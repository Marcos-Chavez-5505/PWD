<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php
include_once '../../../estructura/header.php';
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$edad = $_POST['edad'] ?? '';
$direccion = $_POST['direccion'] ?? '';
?>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12" style="max-width: 600px;">
            <div class="bg-white p-4 rounded shadow-sm text-center">
                <h3 class="mb-3">Datos recibidos</h3>
                
                <p class="lead">
                    Hola, yo soy <strong><?= htmlspecialchars($nombre) ?></strong> 
                    <strong><?= htmlspecialchars($apellido) ?></strong>, 
                    tengo <strong><?= htmlspecialchars($edad) ?></strong> años 
                    y vivo en <strong><?= htmlspecialchars($direccion) ?></strong>.
                </p>

                <a href="javascript:history.back()" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Formulario
                </a>
            </div>
        </div>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php';
?>