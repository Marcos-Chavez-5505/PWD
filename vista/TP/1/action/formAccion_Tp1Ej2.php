<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();
  $control = new horasCursadas();

  // Capturamos las horas de cada día
  $horas = [
    'lunes'     => (int) $encapsulamiento->obtenerValor('lunes'),
    'martes'    => (int) $encapsulamiento->obtenerValor('martes'),
    'miercoles' => (int) $encapsulamiento->obtenerValor('miercoles'),
    'jueves'    => (int) $encapsulamiento->obtenerValor('jueves'),
    'viernes'   => (int) $encapsulamiento->obtenerValor('viernes')
  ];
  $total = $control->sumarHoras($horas);

  include_once __DIR__ . "../../2/horasCursadas.php";
?>