<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $dni       = $encapsulamiento->obtenerValor('nroDni') ?? '';
  $nombre    = $encapsulamiento->obtenerValor('nombre') ?? '';
  $apellido  = $encapsulamiento->obtenerValor('apellido') ?? '';
  $fechaNac  = $encapsulamiento->obtenerValor('fechaNac') ?? null;
  $telefono  = $encapsulamiento->obtenerValor('telefono') ?? '';
  $domicilio = $encapsulamiento->obtenerValor('domicilio') ?? '';
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

  include_once __DIR__ . "../../9/z_actualizarDatosPersona.php";
?>