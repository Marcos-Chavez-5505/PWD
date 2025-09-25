<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/control/4/controlPersona.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/valorEncapsulado.php";

$valorRecibido = new ValorEncapsulado();

$nroDni = $valorRecibido->obtenerValor('dni');

$mensaje = "";
$tipoAlerta = "d-none"; // default
$formulario = "";

if ($nroDni != 0) {

    $control = new ControlPersona();
    $persona = $control->obtenerPersona($nroDni);

    // Verificamos si existe la persona
    if (!$persona) {
        $mensaje = "Error: La persona con DNI: ".$nroDni." no existe en la base de datos.";
        $tipoAlerta = "alert alert-danger fw-bold fs-5 text-center";
        $formulario = "d-none";
    } 
    // Devuelve los datos de la persona
    else {
        $datosPersona = [
            'nroDni'    => $nroDni,
            'nombre'    => $persona->getNombre(),
            'apellido'  => $persona->getApellido(),
            'fechaNac'  => $persona->getFechaNac(),
            'telefono'  => $persona->getTelefono(),
            'domicilio' => $persona->getDomicilio()
        ];
    }

} else {
    $mensaje = "No se recibieron datos.";
    $tipoAlerta = "alert alert-danger fw-bold fs-5 text-center";
    $formulario = "d-none";
}
?>

<?php include_once '../../../estructura/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Buscar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/header-footer.css">
    <link rel="stylesheet" href="../../../../home/fonts/css/all.min.css">
</head>
<body>
    <main class="container py-5 my-5 d-flex justify-content-center">
        <div class="card p-4 shadow-sm w-100" style="max-width: 800px;">

            <div class="<?= $tipoAlerta ?>">
                <?= $mensaje ?>
            </div>


            <h3 class="text-center mb-4 <?= $formulario ?>">Información de la persona solicitada</h3>
            <form id="personaUpdateForm" action="z_actualizarDatosPersona.php" method="post" class="<?= $formulario ?>">

                <div class="mb-3">
                    <label for="nroDni" class="form-label">DNI:</label>
                    <input type="text" name="nroDni" id="nroDni" class="form-control" value=<?= $datosPersona['nroDni'] ?> readonly> <!-- solución insegura para uso real -->
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value=<?= $datosPersona['nombre'] ?> required>
                    <div class="invalid-feedback">El nombre es obligatorio.</div>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" value=<?= $datosPersona['apellido'] ?> required>
                    <div class="invalid-feedback">El apellido es obligatorio.</div>
                </div>

                <div class="mb-3">
                    <label for="fechaNac" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNac" id="fechaNac" class="form-control" value=<?= $datosPersona['fechaNac'] ?> >
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value=<?= $datosPersona['telefono'] ?> >
                </div>

                <div class="mb-3">
                    <label for="domicilio" class="form-label">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control" value=<?= $datosPersona['domicilio'] ?> >
                </div>

                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-check-circle"></i> Guardar
                </button>
            </form>
            <div class="text-center mt-4">
                <a href="/PWD/vista/TP/4/9/buscarPersona.php" class="btn btn-secondary m-2">Volver</a>
            </div>
        </div>
    </main>

</body>
</html>

<?php include_once '../../../estructura/footer.php'; ?>
