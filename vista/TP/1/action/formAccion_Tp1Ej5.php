<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  // Capturamos los datos usando la función
  $nombre       = $encapsulamiento->obtenerValor('nombre');
  $apellido     = $encapsulamiento->obtenerValor('apellido');
  $edad         = $encapsulamiento->obtenerValor('edad');
  $direccion    = $encapsulamiento->obtenerValor('direccion');
  $nivelEstudio = $encapsulamiento->obtenerValor('nivelEstudio');
  $genero       = $encapsulamiento->obtenerValor('opcion');

  include_once __DIR__ . "../../5/mostrarDatos5.php";
?>