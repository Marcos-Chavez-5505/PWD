<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  $control = new ControlAuto();
  $autos = $control->listarTodosLosAutos();

  include_once __DIR__ . "../../3/VerAutos.php";
?>
