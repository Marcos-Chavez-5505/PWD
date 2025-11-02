<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  // Listamos todas las personas para elegir dueño
  $controlPersona = new ControlPersona();
  $personas = $controlPersona->listarPersonas();

  include_once __DIR__ . "../../7/nuevoAuto.php";
?>