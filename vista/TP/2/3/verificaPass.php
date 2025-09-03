<?php
require_once __DIR__ . "/../../../../control/2/controlEj2.php";

$usuarios = [
    ['usuario' => 'marcos', 'clave' => 'marcos1234'],
    ['usuario' => 'diego', 'clave' => 'diego5678'],
    ['usuario' => 'pedro', 'clave' => 'pedroabcd']
];

// Obtener información con método POST o GET (un solo return)
function obtenerValor($campo, $default = '') {
    $valor = $default;

    if (isset($_POST[$campo])) {
        $valor = trim($_POST[$campo]);
    } elseif (isset($_GET[$campo])) {
        $valor = trim($_GET[$campo]);
    }

    return $valor;
}

$usuarioIngresado = obtenerValor('usuario');
$claveIngresada   = obtenerValor('clave');  

$mostrarResultado = false;
$errores          = [];
$mensaje          = '';
$loginExitoso     = false;
$nombreUsuario    = '';

if ($usuarioIngresado === '' || $claveIngresada === '') {
    $mensaje = "<div class='alert alert-warning'><h4>Error: faltan datos del formulario.</h4></div>";
} else {
    $control = new ControlEj2();
    $errores = $control->validarDatos($usuarioIngresado, $claveIngresada);

    if (!empty($errores)) {
        $mensaje = "<div class='alert alert-danger'><h4>Errores encontrados:</h4><ul>";
        foreach ($errores as $error) {
            $mensaje .= "<li>" . htmlspecialchars($error) . "</li>";
        }
        $mensaje .= "</ul><a href='formulario.php' class='btn btn-outline-primary'>Volver al login</a></div>";
    } else {
        $mostrarResultado = true;
    }
}

if ($mostrarResultado) {
    $i = 0;
    $flag = true;

    while ($i < count($usuarios) && $flag) {
        $user = $usuarios[$i];
        if ($user['usuario'] === $usuarioIngresado && $user['clave'] === $claveIngresada) {
            $loginExitoso  = true;
            $nombreUsuario = $user['usuario'];
            $flag = false;
        }
        $i++;
    }

    if ($loginExitoso) {
        $mensaje = "<div class='alert alert-success'><h2>Bienvenido, " . htmlspecialchars($nombreUsuario) . "!</h2></div>";
    } else {
        $mensaje = "<div class='alert alert-danger'><h2>Usuario o contraseña incorrectos.</h2>
                    <a href='formulario.php' class='btn btn-outline-primary mt-2'>Volver al login</a></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include_once '../../../estructura/header.php'; ?>

    <main class="container mt-5 mb-5">
        <?= $mensaje ?>
    </main>

    <!-- Footer -->
    <?php include_once '../../../estructura/footer.php'; ?>

</body>
</html>
