<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  // Capturamos los datos usando la función
  $num1      = $encapsulamiento->obtenerValor('numero1', 0);
  $num2      = $encapsulamiento->obtenerValor('numero2', 0);
  $operacion = $encapsulamiento->obtenerValor('operacion', 'suma');

  $objOpe = new Operaciones();
  $resultado = $objOpe->operacion($operacion, $num1, $num2);

  // Para mostrar la operación con texto bonito
  switch($operacion){
    case "suma":
      $simbolo = "+";
      $nombreOperacion = "Suma";
      break;
    case "resta":
      $simbolo = "-";
      $nombreOperacion = "Resta";
      break;
    case "multiplicacion":
      $simbolo = "×";
      $nombreOperacion = "Multiplicación";
      break;
    default:
      $simbolo = "?";
      $nombreOperacion = "Desconocida";
  }

  include_once __DIR__ . "../../7/resultado.php";
?>