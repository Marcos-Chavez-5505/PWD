<?php
require_once __DIR__ . "/../../../../control/2/controlEj2.php";

$usuarios = [
    ['usuario' => 'marcos', 'clave' => 'marcos1234'],
    ['usuario' => 'diego', 'clave' => 'diego5678'],
    ['usuario' => 'pedro', 'clave' => 'pedroabcd']
];

// Obtener informacion con metodo POST o GET
function obtenerValor($campo, $default = '') {
    return isset($_REQUEST[$campo]) ? trim($_REQUEST[$campo]) : $default;
}

$usuarioIngresado = obtenerValor('usuario');
$claveIngresada   = obtenerValor('clave');  

$mostrarResultado = false;

if ($usuarioIngresado === '' || $claveIngresada === '') {
    echo "<h2>Error: faltan datos del formulario.</h2>";
} else {
    $control = new ControlEj2();
    $errores = $control->validarDatos($usuarioIngresado, $claveIngresada);

    if (!empty($errores)) {
        echo "<h2>Errores encontrados:</h2><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><a href='formulario.php'>Volver al login</a>";
    } else {
        $mostrarResultado = true;
    }
}

if ($mostrarResultado) {
    $loginExitoso = false;
    $nombreUsuario = "";
    $i = 0;
    $flag = true;

    while ($i < count($usuarios) && $flag) {
        $user = $usuarios[$i];
        if ($user['usuario'] === $usuarioIngresado && $user['clave'] === $claveIngresada) {
            $loginExitoso = true;
            $nombreUsuario = $user['usuario'];
            $flag = false;
        }
        $i++;
    }

    if ($loginExitoso) {
        echo "<h2>Bienvenido, $nombreUsuario!</h2>";
    } else {
        echo "<h2>Usuario o contraseña incorrectos.</h2>";
        echo '<a href="formulario.php">Volver al login</a>';
    }
}
?>
