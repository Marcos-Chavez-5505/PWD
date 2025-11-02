<?php
  require_once __DIR__ . "../../../../../configuracion.php";
  $encapsulamiento = new ValorEncapsulado();

  $usuarios = [
    ['usuario' => 'marcos', 'clave' => 'marcos1234'],
    ['usuario' => 'diego', 'clave' => 'diego5678'],
    ['usuario' => 'pedro', 'clave' => 'pedroabcd']
  ];

  $usuarioIngresado = $encapsulamiento->obtenerValor('usuario');
  $claveIngresada   = $encapsulamiento->obtenerValor('clave');  

  $mostrarResultado = false;
  $errores          = [];
  $mensaje          = '';
  $loginExitoso     = false;
  $nombreUsuario    = '';

  if ($usuarioIngresado === '' || $claveIngresada === '') {
    $mensaje = "<div class='alert alert-warning'><h4>Error: faltan datos del formulario.</h4></div>";
  } else {
    $control = new ControlTP2Ej2();
    $errores = $control->validarDatos($usuarioIngresado, $claveIngresada);

    if (!empty($errores)) {
      $mensaje = "<div class='alert alert-danger'><h4>Errores encontrados:</h4><ul>";
      foreach ($errores as $error) {
        $mensaje .= "<li>" . htmlspecialchars($error) . "</li>";
      }
      $mensaje .= "</ul><a href='/PWD/vista/2/3/formulario.php' class='btn btn-outline-primary'>Volver al login</a></div>";
    } else {
      $mostrarResultado = true;
    }
  }

  if ($mostrarResultado) {
    $i = 0;
    $flag = true;

    while ($i < count($usuarios) && $flag) {
      $user = $usuarios[$i];
      if ($user['usuario'] === $usuarioIngresado && $user['clave'] === $claveIngresada) {
        $loginExitoso  = true;
        $nombreUsuario = $user['usuario'];
        $flag = false;
      }
      $i++;
    }
    $mensaje .= "<div style='display:flex; flex-direction:column; padding:10%; align-items:center;'>";
    if ($loginExitoso) {
      $mensaje .= "<div class='alert alert-success' style='display:flex; flex-direction:column; align-items:center'><h2>Bienvenido, " . htmlspecialchars($nombreUsuario) . "!</h2>";
    } else {
      $mensaje .= "<div class='alert alert-danger' style='display:flex; flex-direction:column; align-items:center;'><h2>Usuario o contraseña incorrectos.</h2>";
    }

    $mensaje .= "<a href='/PWD/vista/TP/2/3/formulario.php' class='btn btn-outline-primary mt-2' style='width:fit-content;'>Volver al login</a></div></div></div>";
  }

  include_once __DIR__ . "../../3/verificaPass.php";
?>