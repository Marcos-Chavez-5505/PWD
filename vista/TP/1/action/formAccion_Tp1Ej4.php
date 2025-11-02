<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  // Capturamos los datos usando la función
  $nombre    = $encapsulamiento->obtenerValor('nombre');
  $apellido  = $encapsulamiento->obtenerValor('apellido');
  $edad      = $encapsulamiento->obtenerValor('edad');
  $direccion = $encapsulamiento->obtenerValor('direccion');

  // Instancia de la clase Edad
  $edadObj = new Edad();
  $mensajeEdad = $edad !== '' ? $edadObj->generarMensaje((int)$edad) : '';

  include_once __DIR__ . "../../4/mostrarDatos4.php";
?>