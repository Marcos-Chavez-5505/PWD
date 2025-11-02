<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();
  
  $validador = new verNumero();

  $numero    = $encapsulamiento->obtenerValor('numero');
  $mensaje   = '';
  $tieneDato = ($numero !== '');
  if ($tieneDato) {
    $mensaje = $validador->validarNumero($numero);
  }

  include_once __DIR__ . "../../1/vernumero.php";
?>