<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $nombre   = $encapsulamiento->obtenerValor('nombre');
  $apellido = $encapsulamiento->obtenerValor('apellido');
  $edad     = $encapsulamiento->obtenerValor('edad');
  $direccion= $encapsulamiento->obtenerValor('direccion');

  include_once __DIR__ . "../../3/mostrarDatos3.php";
?>