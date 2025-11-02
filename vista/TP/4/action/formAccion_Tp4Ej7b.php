<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $mensaje = "";
  $tipoAlerta = "danger";
  $patente   = $encapsulamiento->obtenerValor('patente') ?? '';
  $marca     = $encapsulamiento->obtenerValor('marca') ?? '';
  $modelo    = $encapsulamiento->obtenerValor('modelo') ?? '';
  $dniDuenio = $encapsulamiento->obtenerValor('dniDuenio') ?? '';
  if ($patente != 0 && $marca != 0 && $modelo != 0 && $dniDuenio != 0) {
    $controlPersona = new ControlPersona();
    $duenio = $controlPersona->obtenerPersona($dniDuenio);
    if ($duenio) {
      $controlAuto = new ControlAuto();
      $nuevoAuto = [
        'patente'   => $patente,
        'marca'     => $marca,
        'modelo'    => $modelo,
        'dniDuenio' => $dniDuenio
        ];
        $resultado = $controlAuto->insertarAuto($nuevoAuto);
        if ($resultado === 1) {
          $mensaje = "✅ Auto cargado correctamente.";
          $tipoAlerta = "success";
        } elseif ($resultado === -1) {
          $mensaje = "⚠️ Error: la patente ya existe en la base de datos.";
          $tipoAlerta = "warning";
        } else {
          $mensaje = "❌ Error inesperado al insertar el auto.";
        }
    } else {
      $mensaje = "⚠️ El dueño con DNI $dniDuenio no existe en la base de datos.";
      $tipoAlerta = "danger";
    }
  } else {
    $mensaje = "⚠️ No se recibieron datos.";
  }

  include_once __DIR__ . "../../7/z_accionNuevoAuto.php";
?>