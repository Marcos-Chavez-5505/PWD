<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $patente = $encapsulamiento->obtenerValor('patente');
  $mensaje = "";
  $tipoAlerta = "d-none"; // default
  $esconder = "";
  if ($patente != 0){
    $control = new ControlAuto();
    $auto = $control->obtenerAuto($patente);
    // Verificamos si existe el auto
    if (!$auto) {
      $mensaje = "Error: El auto con patente: ".$patente." no existe en la base de datos.";
      $tipoAlerta = "alert alert-danger fw-bold fs-5 text-center";
      $esconder = "d-none";
    } 
    // Devuelve los datos del auto
    else {
      $datosAuto = [
        'patente'   => $patente,
        'marca'     => $auto->getMarca(),
        'modelo'    => $auto->getModelo(),
        'nombre'    => $auto->getObjDuenio()->getNombre() ?? '',
        'apellido'  => $auto->getObjDuenio()->getApellido() ?? ''
      ];
    }
  } else {
    $mensaje = "No se recibieron datos.";
    $tipoAlerta = "alert alert-danger fw-bold fs-5 text-center";
    $esconder = "d-none";
  }

  include_once __DIR__ . "../../4/z_accionBuscarAuto.php";
?>