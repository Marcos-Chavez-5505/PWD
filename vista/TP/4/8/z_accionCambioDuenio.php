<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlAuto.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlPersona.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/valorEncapsulado.php";

$valorRecibido = new ValorEncapsulado();

$nroDni = $valorRecibido->obtenerValor('dni');
$patente = $valorRecibido->obtenerValor('patente');  

$mensaje = "";
$tipoAlerta = "info"; // default

if ($nroDni != 0 && $patente != 0) {

    $controlAuto = new ControlAuto();
    $controlPersona = new ControlPersona();

    // Verificamos si existe el auto
    $auto = $controlAuto->obtenerAuto($patente);
    if (!$auto) {
        $mensaje = "Error: No existe un auto con esta patente (patente ingresada: ".strtoupper($patente).").";
        $tipoAlerta = "danger";
    } 
    // Verificamos si existe la persona
    elseif (!$controlPersona->obtenerPersona($nroDni)) {
        $mensaje = "Error: La persona con DNI: ".$nroDni." no existe en la base de datos.";
        $tipoAlerta = "danger";
    } 
    // Verificamos si el auto ya pertenece a esa persona
    elseif ($controlAuto->perteneceDuenio($patente, $nroDni)) {
        $mensaje = "Error: El auto con patente ".strtoupper($patente)." ya está asociado a la persona con DNI ".$nroDni.".";
        $tipoAlerta = "warning";
    } 
    // Realizamos el cambio de dueño
    else {
        $persona = $controlPersona->obtenerPersona($nroDni);
        if ($controlAuto->cambiarDuenio($patente, $persona)) {
            $mensaje = "Cambio de dueño (DNI: ".$nroDni.") realizado con éxito para patente ".strtoupper($patente).".";
            $tipoAlerta = "success";
        } else {
            $mensaje = "Error: No se pudo realizar el cambio de dueño para este auto.";
            $tipoAlerta = "danger";
        }
    }

} else {
    $mensaje = "No se recibieron datos.";
    $tipoAlerta = "danger";
}
?>

<?php include_once '../../../estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Cambio Dueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>
<main class="container py-5 my-5 d-flex justify-content-center">
    <div class="card p-4 shadow-sm w-100" style="max-width: 800px;">
        <div class="alert alert-<?= $tipoAlerta ?> fw-bold fs-5 text-center">
            <?= $mensaje ?>
        </div>
        <div class="text-center mt-4">
            <a href="/PWD/vista/TP/4/8/CambioDuenio.php" class="btn btn-secondary m-2">Volver</a>
        </div>
    </div>
</main>
</body>
</html>

<?php include_once '../../../estructura/footer.php'; ?>
