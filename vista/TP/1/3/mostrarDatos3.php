<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php
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
$nombre   = obtenerValor('nombre');
$apellido = obtenerValor('apellido');
$edad     = obtenerValor('edad');
$direccion= obtenerValor('direccion');
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

                <a href="Ejercicio3.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Ir al formulario
                </a>
            </div>
        </div>
    </div>
</main>

<?php
include_once '../../../estructura/footer.php';
?>
