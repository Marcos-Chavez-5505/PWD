<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $nroDni = $encapsulamiento->obtenerValor('nroDni');
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

  include_once __DIR__ . "../../9/z_accionBuscarPersona.php";
?>