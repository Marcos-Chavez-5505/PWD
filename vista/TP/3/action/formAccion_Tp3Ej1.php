<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  $controlEJ1 = new controlTP3EJ1();
  $mensaje = $controlEJ1->veryfyFile();

  include_once __DIR__ . "../../1/mostrar.php";
?>