<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlAuto.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/valorEncapsulado.php";


$valorRecibido = new ValorEncapsulado();


$nroDni = $valorRecibido->obtenerValor('dni');
$patente = $valorRecibido->obtenerValor('patente');  

$mensaje = "";

if ($nroDni != 0 && $patente != 0) {

    $control = new ControlAuto();


    if ($control->obtenerAuto($patente)){
        $mensaje = "Error: No existe un auto con esta petente (patente ingresada: ".strtoupper($patente).").";
    }
    elseif ($control->obtenerPersona($nroDni)){
        $mensaje = "Error: La persona con DNI: ".$nroDni." no existe en la base de datos.";
    }
    elseif ($control->perteneceDuenio($patente, $nroDni)){
        $mensaje = "Error: El auto con patente ".strtoupper($patente)." ya está asociado a la persona con DNI ".$nroDni.".";
    }
    else {
        if ($control->cambiarDuenio($patente, $nroDni)){
            $mensaje = "Cambio de dueño (DNI: ".$nroDni.") realizado con éxito para patente ".strtoupper($patente).".";
        }
        else {
            $mensaje = "Error: No se pudo realizar el cambio de duenio para este auto.";
        }
    }

} else {
    $mensaje = "No se recibieron datos.";
}
?>

<?php include_once '../../../estructura/header.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Cambio Dueño</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">

</head>
<body>
    <main class="container py-5 my-5 d-flex justify-content-center">

        <div class="card p-4 shadow-sm w-100" style="max-width: 800px;">
            <h1 class="mb-4"><?= $mensaje ?></h1>
            <a href="./cambioDuenio.php" class="btn btn-secondary m-2 my-5 mx-5">Volver</a>
            <!-- <a href="../3/listarPersonas.php" class="btn btn-primary m-2">Ver listado de personas</a> -->
        </div>

    </main>
</body>
</html>

<?php include_once '../../../estructura/footer.php'; ?>