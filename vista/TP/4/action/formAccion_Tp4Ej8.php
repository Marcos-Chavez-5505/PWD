<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $nroDni = $encapsulamiento->obtenerValor('nroDni');
  $patente = $encapsulamiento->obtenerValor('patente');  
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

  include_once __DIR__ . "../../8/z_accionCambioDuenio.php";
?>