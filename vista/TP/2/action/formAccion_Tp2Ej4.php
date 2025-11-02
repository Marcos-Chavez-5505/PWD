<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();
  
  // Crear instancia de la clase
  $control = new ControlPelicula();
  // Verificar que llegaron datos
  $hayDatos = ($_SERVER['REQUEST_METHOD'] === 'POST');

  // Si llegaron datos, armo el array y valido
  $errores = [];
  $datos   = [];

  if ($hayDatos) {
    $datos = [
      'titulo'       => $encapsulamiento->obtenerValor('titulo'),
      'actores'      => $encapsulamiento->obtenerValor('actores'),
      'director'     => $encapsulamiento->obtenerValor('director'),
      'guion'        => $encapsulamiento->obtenerValor('guion'),
      'produccion'   => $encapsulamiento->obtenerValor('produccion'),
      'anio'         => $encapsulamiento->obtenerValor('anio'),
      'nacionalidad' => $encapsulamiento->obtenerValor('nacionalidad'),
      'genero'       => $encapsulamiento->obtenerValor('genero'),
      'duracion'     => $encapsulamiento->obtenerValor('duracion'),
      'restriccion'  => $encapsulamiento->obtenerValor('restriccion'),
      'sinopsis'     => $encapsulamiento->obtenerValor('sinopsis'),
    ];

    $errores = $control->validarPelicula($datos);
  }
  include_once __DIR__ . "../../4/pelicula.php";
?>