<?php
require_once __DIR__ . "/../../../../control/2/controlEj3.php";

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
$control = new ControlPelicula();

// Verificar que llegaron datos
$hayDatos = ($_SERVER['REQUEST_METHOD'] === 'POST');

// Si llegaron datos, armo el array y valido
$errores = [];
$datos   = [];

if ($hayDatos) {
    $datos = [
        'titulo'       => obtenerValor('titulo'),
        'actores'      => obtenerValor('actores'),
        'director'     => obtenerValor('director'),
        'guion'        => obtenerValor('guion'),
        'produccion'   => obtenerValor('produccion'),
        'anio'         => obtenerValor('anio'),
        'nacionalidad' => obtenerValor('nacionalidad'),
        'genero'       => obtenerValor('genero'),
        'duracion'     => obtenerValor('duracion'),
        'restriccion'  => obtenerValor('restriccion'),
        'sinopsis'     => obtenerValor('sinopsis'),
    ];

    $errores = $control->validarPelicula($datos);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Película introducida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include_once '../../../estructura/header.php'; ?>

    <main class="container mt-5 mb-5">
        <div class="container mt-4">
            <?php if (!$hayDatos): ?>
                <div class="alert alert-warning">
                    <h2>No se recibieron datos del formulario.</h2>
                </div>
            <?php elseif (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <h4>Errores en el formulario:</h4>
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
                <div class="alert alert-success">
                    <h1 class="alert-heading text-primary">La película introducida es</h1>
                    <br>
                    <p>
                        <strong>Título:</strong> <?= htmlspecialchars($datos['titulo']) ?><br>
                        <strong>Actores:</strong> <?= htmlspecialchars($datos['actores']) ?><br>
                        <strong>Director:</strong> <?= htmlspecialchars($datos['director']) ?><br>
                        <strong>Guión:</strong> <?= htmlspecialchars($datos['guion']) ?><br>
                        <strong>Producción:</strong> <?= htmlspecialchars($datos['produccion']) ?><br>
                        <strong>Año:</strong> <?= htmlspecialchars($datos['anio']) ?><br>
                        <strong>Nacionalidad:</strong> <?= htmlspecialchars($datos['nacionalidad']) ?><br>
                        <strong>Género:</strong> <?= htmlspecialchars($datos['genero'] ?: 'No especificado') ?><br>
                        <strong>Duración:</strong> <?= htmlspecialchars($datos['duracion']) ?><br>
                        <strong>Restricciones de edad:</strong> <?= htmlspecialchars($datos['restriccion']) ?><br>
                        <strong>Sinopsis:</strong> <?= nl2br(htmlspecialchars($datos['sinopsis'])) ?>
                    </p>
                </div>
            <?php endif; ?>

            <div class="text-end">
                <a href="formulario.php" class="btn btn-outline-primary">Volver al formulario</a>
            </div>
        </div>
    </main>            

    <!-- Footer -->
    <?php include_once '../../../estructura/footer.php'; ?>

</body>
</html>
