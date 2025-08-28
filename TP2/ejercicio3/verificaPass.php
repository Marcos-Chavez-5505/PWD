<?php

$usuarios = [
    ['usuario' => 'marcos', 'clave' => 'marcos1234'],
    ['usuario' => 'diego', 'clave' => 'diego5678'],
    ['usuario' => 'pedro', 'clave' => 'pedroabcd']
];

$usuarioIngresado = $_POST['usuario'];
$claveIngresada = $_POST['clave'];

$loginExitoso = false;

$i = 0;
$flag = true;

while($i < count($usuarios) && $flag){
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
?>
