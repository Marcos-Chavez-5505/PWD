<?php
// Ruta CORRECTA desde verificaPass.php hasta control/2/
require_once __DIR__ . '/../../../../../control/2/controlEj2.php';

// Lista de usuarios válidos
$usuarios = [
    ['usuario' => 'marcos', 'clave' => 'marcos1234'],
    ['usuario' => 'diego', 'clave' => 'diego5678'],
    ['usuario' => 'pedro', 'clave' => 'pedroabcd']
];

// Verificar que llegaron datos
if (!isset($_POST['usuario']) || !isset($_POST['clave'])) {
    echo "<h2>Error: faltan datos del formulario.</h2>";
    exit;
}

$usuarioIngresado = trim($_POST['usuario']);
$claveIngresada   = trim($_POST['clave']);

// ✅ Usar la función del archivo control.php
$errores = validarDatos($usuarioIngresado, $claveIngresada);

if (!empty($errores)) {
    echo "<h2>Errores encontrados:</h2><ul>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul><a href='formulario.php'>Volver al login</a>";
    exit;
}

// Verificar credenciales con while + bandera
$loginExitoso = false;
$nombreUsuario = "";

$i = 0;
$flag = true;

while ($i < count($usuarios) && $flag) {
    $user = $usuarios[$i];
    if ($user['usuario'] === $usuarioIngresado && $user['clave'] === $claveIngresada) {
        $loginExitoso = true;
        $nombreUsuario = $user['usuario'];
        $flag = false; // corta el bucle
    }
    $i++;
}

// Resultado
if ($loginExitoso) {
    echo "<h2>Bienvenido, $nombreUsuario!</h2>";
} else {
    echo "<h2>Usuario o contraseña incorrectos.</h2>";
    echo '<a href="formulario.php">Volver al login</a>';
}
?>