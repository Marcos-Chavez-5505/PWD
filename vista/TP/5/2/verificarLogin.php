<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/modelo/conector/conector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/modelo/tp5/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/claseSession.php';


$session = new Session();
$nombreUsuario = $_POST['nombreUsuario'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($nombreUsuario) || empty($password)) {
    header("Location: /PWD/vista/login.php?error=campos_vacios");
    exit;
}

$usuario = new Usuario();
$condicion = "nombreUsuario = '" . addslashes($nombreUsuario) . "'";
$usuarios = $usuario->listar($condicion);

//provisional
// if (count($usuarios) > 0) {
//     $usuarioEncontrado = $usuarios[0];
//     if ((function_exists('password_verify') && password_verify($password, $usuarioEncontrado->getPassword())) || $password == $usuarioEncontrado->getPassword()) {
//         $session->iniciar($usuarioEncontrado->getNombreUsuario(), $password);
//         header("Location: /PWD/vista/TP/5/2/paginaSegura.php");
//         exit;
//     } else {
//         header("Location: /PWD/vista/TP/5/2/login.php?error=pass_incorrecto");
//         exit;
//     }
// } else {
//     header("Location: /PWD/vista/TP/5/2/login.php?error=no_existe");
//     exit;
// }
// ?>
