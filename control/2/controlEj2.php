<?php
// control.php
function validarDatos($usuario, $clave) {
    $errores = [];

    // Usuario obligatorio y mínimo 4 caracteres
    if (empty($usuario) || strlen($usuario) < 4) {
        $errores[] = "El nombre de usuario es obligatorio y debe tener al menos 4 caracteres.";
    }

    // Clave obligatoria y con reglas
    if (empty($clave) || strlen($clave) < 8) {
        $errores[] = "La contraseña es obligatoria y debe tener al menos 8 caracteres.";
    } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', $clave)) {
        $errores[] = "La contraseña debe contener letras y números.";
    }

    // Clave distinta al usuario
    if ($usuario === $clave) {
        $errores[] = "La contraseña no puede ser igual al nombre de usuario.";
    }

    return $errores; // devuelve array vacío si todo está bien
}
?>
