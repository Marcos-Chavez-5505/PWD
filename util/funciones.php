<?php
/**
 * La función spl_autoload_register es PHP, se usa para registrar funciones o métodos que
 * cargan automáticamente clases o interfaces cuando se intenta usarlas y aún no fueron
 * incluídas.
 * Ejemplo:
 * $obj = new Usuario();
 * esto usa automáticamente 'Usuario' como $clase
*/
spl_autoload_register(function ($clase){
  //echo "Se cargó la clase: ".$clase;
  $directories = array(
    $GLOBALS['ROOT'] . 'modelo/',
    $GLOBALS['ROOT'] . 'modelo/conector/',
    $GLOBALS['ROOT'] . 'control/',
    $GLOBALS['ROOT']                // revisar si es necesario la inclusión de css, img, etc.
  );
  
  // //print_r($directories);
  // foreach($directories as $directory){
    //   if(file_exists($directory . $clase . '.php')) {
      //     //echo "se incluyó ".$directory. $class_name . '.php';
      //     require_once($directory . $clase . '.php');
      //     return;
      //   } //este return lo hizo juanma, analizar si es mejor while + bandera (si funciona while + bandera borrar este trozo comentado)
      // }
      
  //print_r($directories);
  $bandera = false;
  $i = 0;
  $max = count($directories);
  while (!$bandera && $i < $max){
    $directory = $directories[$i];
    if(file_exists($directory . $clase . '.php')) {
      //echo "se incluyó ".$directory. $class_name . '.php';
      require_once($directory . $clase . '.php');
      $bandera = true;
    }
    $i++;
  }
  return;
});

function verEstructura($e){
  echo "<pre>";
  print_r($e);
  echo "</pre>";
}
?>