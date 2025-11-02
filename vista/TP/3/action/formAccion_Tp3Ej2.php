<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  $controlEJ2 = new controlTP3EJ2;
  $mensaje = $controlEJ2->verifyFile();

  include_once __DIR__ . "../../2/print.php";
?>