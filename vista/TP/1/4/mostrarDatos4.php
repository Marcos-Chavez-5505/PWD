<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php
include_once __DIR__ . "../../../../estructura/header.php";
?>

<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-4 rounded shadow-sm" style="width: 500px;">
        <h3 class="mb-3 text-center">Datos recibidos</h3>

        <p class="lead">
            Hola, yo soy <strong><?= htmlspecialchars($nombre) ?></strong> 
            <strong><?= htmlspecialchars($apellido) ?></strong>, 
            tengo <strong><?= htmlspecialchars($edad) ?></strong> años 
            y vivo en <strong><?= htmlspecialchars($direccion) ?></strong>.
        </p>
        <p class="lead fw-bold">
            <?= "Según la edad, sos " . htmlspecialchars($mensajeEdad) ?>
        </p>

        <div class="d-grid">
            <a href="/PWD/vista/TP/1/4/Ejercicio4.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Formulario
            </a>
        </div>
    </div>
</main>

<?php
include_once __DIR__ . "../../../../estructura/footer.php";
?>
