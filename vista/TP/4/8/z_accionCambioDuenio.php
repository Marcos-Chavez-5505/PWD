<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlCambioDuenio.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/valorEncapsulado.php";


// Crear instancia de clase
$valorRecibido = new ValorEncapsulado();


$nroDni = $valorRecibido->obtenerValor('dni');
$patente = $valorRecibido->obtenerValor('patente');  
// TIRA UN ERROR DE QUE YA EXISTE PERO LO CREA IGUAL, DEPUES LO CORRIGO 😎

$mensaje = "";

if ($nroDni != 0 && $patente != 0) {
    // Tomamos los datos del formulario con null coalescing
    // $dni = $nroDni ?? '';
    // $patente1 = $patente ?? '';

    $control = new ControlCambioDuenio();


    if ($control->obtenerAuto($patente) == null){
        $mensaje = "Error: No existe un auto con esta petente (patente ingresada:".$patente.").";
    }
    elseif ($control->obtenerPersona($dni) == null){
        $mensaje = "Error: La persona con DNI: ".$dni." no existe en la base de datos.";
    }
    elseif ($control->perteneceDuenio($patente, $dni)){
        $mensaje = "Error: El auto con patente ".$patente." ya está asociado a la persona con DNI ".$dni.".";
    }
    else {
        if ($control->cambiarDuenio($patente, $dni)){
            $mensaje = "Cambio de dueño (DNI: ".$dni.") realizado con éxito para patente ".$patente.".";
        }
        else {
            $mensaje = "Error: No se pudo realizar el cambio de duenio para este auto.";
        }
    }

} else {
    $mensaje = "No se recibieron datos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Nueva Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4"><?= $mensaje ?></h1>
        <a href="NuevaPersona.php" class="btn btn-secondary">Volver</a>
        <a href="../3/listarPersonas.php" class="btn btn-primary">Ver listado de personas</a>
    </div>
</body>
</html>
