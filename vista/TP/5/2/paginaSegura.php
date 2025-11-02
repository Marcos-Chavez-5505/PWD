<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/claseSession.php';
$session = new Session();

if (!$session->activa()) {
    header("Location: /PWD/vista/login.php");
    exit;
}
?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/vista/estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Segura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/PWD/vista/css/header-footer.css">
    <link rel="stylesheet" href="/PWD/home/fonts/css/all.min.css">
</head>
<body>
<main class="container py-5 my-5 d-flex justify-content-center">
    <div class="card p-4 shadow-sm w-100" style="max-width: 600px; max-height: 200px;">
        <h3 class="text-center mb-4">Bienvenido, <?= $session->getUsuario(); ?></h3>
        <p class="text-center">Esta página es solo accesible para usuarios logueados.</p>
    </div>
</main>
</body>
</h
