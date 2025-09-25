<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlPersona.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/valorEncapsulado.php";

$valorRecibido = new ValorEncapsulado();

$dni       = $valorRecibido->obtenerValor('nroDni') ?? '';
$nombre    = $valorRecibido->obtenerValor('nombre') ?? '';
$apellido  = $valorRecibido->obtenerValor('apellido') ?? '';
$fechaNac  = $valorRecibido->obtenerValor('fechaNac') ?? null;
$telefono  = $valorRecibido->obtenerValor('telefono') ?? '';
$domicilio = $valorRecibido->obtenerValor('domicilio') ?? '';

$mensaje = "";
$tipoAlerta = "info"; // default

if ($dni != 0 && $dni != ''){

    $control = new ControlPersona();

    // Array con claves que espera ControlPersona
    $datosActualizadosPersona = [
        'nroDni'    => $dni,
        'nombre'    => $nombre,
        'apellido'  => $apellido,
        'fechaNac'  => $fechaNac,
        'telefono'  => $telefono,
        'domicilio' => $domicilio
    ];

    // Insertamos la persona
    $resultado = $control->modificarPersona($datosActualizadosPersona);

    if ($resultado === 1) {
        $mensaje = "Persona actualizada correctamente.";
        $tipoAlerta = "success";
    } elseif ($resultado === -1) {
        $mensaje = "Error: no se lograron modificar los datos de la persona o esta no existe en la base de datos.";
        $tipoAlerta = "warning";
    } elseif ($resultado === 0) {
        $mensaje = "No se modificaron datos.";
        $tipoAlerta = "info";
    } else {
        $mensaje = "Error inesperado.";
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
    <title>Resultado Actualizar Persona</title>
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
            <a href="/PWD/vista/TP/4/9/buscarPersona.php" class="btn btn-secondary m-2">Volver</a>
        </div>
        <div class="text-center mt-4">
            <a href="/PWD/vista/TP/4/5/listarPersonas.php" class="btn btn-primary"><i class="bi bi-people-fill"></i> Ver listado de personas</a>
        </div>
    </div>
</main>
</body>
</html>

<?php include_once '../../../estructura/footer.php'; ?>
