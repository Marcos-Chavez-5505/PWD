<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  // $control = new ControlPersona();
  // $personas = $control->listarPersonas();

  $dni = $encapsulamiento->obtenerValor('dni');
  if (!$dni) {
    die("DNI no recibido.");
  }
  $control = new ControlPersona();
  $persona = $control->obtenerPersona($dni);
  if (!$persona) {
    die("Persona no encontrada.");
  }
  // Obtener autos asociados
  $controlAuto = new ControlAuto();
  $autos = $controlAuto->listarAutosPorDni($dni);

  include_once __DIR__ . "../../5/z_autosPersona.php";
?>