<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  $control = new ControlPersona();
  $personas = $control->listarPersonas();

  include_once __DIR__ . "../../5/listarPersonas.php";
?>