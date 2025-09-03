<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php
include_once __DIR__ . "../../../../../control/1/controlEj8.php";
include_once '../../../estructura/header.php';

// Función para obtener valores desde GET o POST (solo un return)
function obtenerValor($campo, $default = '') {
    $valor = $default;

    if (isset($_POST[$campo])) {
        $valor = trim($_POST[$campo]);
    } elseif (isset($_GET[$campo])) {
        $valor = trim($_GET[$campo]);
    }

    return $valor;
}

// Capturamos los datos usando la función
$edad       = obtenerValor('edad', 0);
$estudiante = obtenerValor('estudiante', 'no');

$entrada = new entradaCine();
$precio = $entrada->calcularPrecio($edad, $estudiante);
?>

<main class="mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h3 class="mb-3 text-center">Precio de tu Entrada</h3>

        <p class="lead text-center">
            Edad: <strong><?= htmlspecialchars($edad) ?></strong><br>
            Estudiante: <strong><?= htmlspecialchars(ucfirst($estudiante)) ?></strong><br>
            <span>El precio de tu entrada es:</span> <strong>$<?= htmlspecialchars($precio) ?></strong>
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
