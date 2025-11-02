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

  // Capturamos los deportes como array 
  $deportes = [];
  if (isset($_POST['deportes']) && is_array($_POST['deportes'])) {
    $deportes = $_POST['deportes'];
  } elseif (isset($_GET['deportes']) && is_array($_GET['deportes'])) {
    $deportes = $_GET['deportes'];
  }
  $cantDepo = count($deportes);   //y contamos cuantos deportes hay

  //esta parte es para imprimir por pantalla los deportes que se eligieron
  $listDeportes = "";
  $listDeportesFinal = end($deportes);
  foreach ($deportes as $deporte){
    if ($deporte == $listDeportesFinal){
      $listDeportes .= $deporte . ".";
    }else{
      $listDeportes .= $deporte . ", ";
    }
  }

  include_once __DIR__ . "../../6/mostrarDatos6.php";
?>