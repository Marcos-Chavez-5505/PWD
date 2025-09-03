<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php 
include_once __DIR__ . "../../../../../control/1/controlEj1.php";
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

// Crear instancia de la clase
$validador = new verNumero(); 
$numero    = obtenerValor('numero');
$mensaje   = '';
$tieneDato = ($numero !== '');
if ($tieneDato) {
    $mensaje = $validador->validarNumero($numero);
}
?>

<main class="container my-5">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">

            <?php if ($tieneDato): ?>
                <div class="card shadow text-center p-4">
                    <h4>Resultado</h4>
                    <p class="fs-5 mt-3">
                        El número que ingresaste es: 
                        <strong><?= htmlspecialchars($numero) ?> (<?= htmlspecialchars($mensaje) ?>)</strong>
                    </p>
                    <a href="Ejercicio1.php" class="btn btn-primary mt-3">Volver al formulario</a>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    No se recibió ningún número.
                    <div class="mt-3">
                        <a href="Ejercicio1.php" class="btn btn-secondary">Ir al formulario</a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php
include_once '../../../estructura/footer.php';
?>
