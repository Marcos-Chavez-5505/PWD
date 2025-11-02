<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  // Capturamos los datos usando la función
  $edad       = $encapsulamiento->obtenerValor('edad', 0);
  $estudiante = $encapsulamiento->obtenerValor('estudiante', 'no');

  $entrada = new entradaCine();
  $precio = $entrada->calcularPrecio($edad, $estudiante);

  include_once __DIR__ . "../../8/precioBoleto.php";
?>