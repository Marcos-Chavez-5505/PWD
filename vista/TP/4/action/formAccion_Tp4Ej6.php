<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $mensaje = "";
  $tipoAlerta = "danger";
  $dni       = $encapsulamiento->obtenerValor('nroDni') ?? '';
  $nombre    = $encapsulamiento->obtenerValor('nombre') ?? '';
  $apellido  = $encapsulamiento->obtenerValor('apellido') ?? '';
  $fechaNac  = $encapsulamiento->obtenerValor('fechaNac') ?? null;
  $telefono  = $encapsulamiento->obtenerValor('telefono') ?? '';
  $domicilio = $encapsulamiento->obtenerValor('domicilio') ?? '';
  if ($dni) {
    $control = new ControlPersona();
    // Array con claves que espera ControlPersona
    $nuevaPersona = [
      'nroDni'    => $dni,
      'nombre'    => $nombre,
      'apellido'  => $apellido,
      'fechaNac'  => $fechaNac,
      'telefono'  => $telefono,
      'domicilio' => $domicilio
    ];
    // Insertamos la persona
    // Emojis aproposito, no me digan GPT
    $resultado = $control->insertarPersona($nuevaPersona);
    if ($resultado === 1) {
      $mensaje = "✅ Persona cargada correctamente.";
      $tipoAlerta = "success";
    } elseif ($resultado === -1) {
      $mensaje = "⚠️ Error: la persona ya existe en la base de datos.";
      $tipoAlerta = "warning";
    } else {
      $mensaje = "❌ Error inesperado.";
    }
  } else {
    $mensaje = "⚠️ No se recibieron datos.";
  }

  include_once __DIR__ . "../../6/z_accionNuevaPersona.php";
?>