<?php
  require_once __DIR__ . "../../../../../configuracion.php";

  $controlEJ3 = new controlTP3EJ3;
  $mensaje = $controlEJ3->moveImage();
  
  include_once __DIR__ . "../../3/mostrarPeli.php";
?>