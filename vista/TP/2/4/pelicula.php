<?php
require_once __DIR__ . "/../../../../control/2/controlEj3.php";

// Crear instancia de la clase
$control = new ControlPelicula();

// Verificar que llegaron datos
if (!$_POST) {
    echo "<h2>No se recibieron datos del formulario.</h2>";
    exit;
}

// Validar usando la clase
$errores = $control->validarPelicula($_POST);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Película introducida</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <?php if (!empty($errores)): ?>
      <div class="alert alert-danger">
        <h4>Errores en el formulario:</h4>
        <ul>
          <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
  <?php else: ?>
      <div class="alert alert-success">
        <h1 class="alert-heading text-primary">La película introducida es</h1>
        <br>
        <p>
          <strong>Título:</strong> <?= htmlspecialchars($_POST['titulo']) ?><br>
          <strong>Actores:</strong> <?= htmlspecialchars($_POST['actores']) ?><br>
          <strong>Director:</strong> <?= htmlspecialchars($_POST['director']) ?><br>
          <strong>Guión:</strong> <?= htmlspecialchars($_POST['guion']) ?><br>
          <strong>Producción:</strong> <?= htmlspecialchars($_POST['produccion']) ?><br>
          <strong>Año:</strong> <?= htmlspecialchars($_POST['anio']) ?><br>
          <strong>Nacionalidad:</strong> <?= htmlspecialchars($_POST['nacionalidad']) ?><br>
          <strong>Género:</strong> <?= htmlspecialchars($_POST['genero'] ?? 'No especificado') ?><br>
          <strong>Duración:</strong> <?= htmlspecialchars($_POST['duracion']) ?><br>
          <strong>Restricciones de edad:</strong> <?= htmlspecialchars($_POST['restriccion']) ?><br>
          <strong>Sinopsis:</strong> <?= nl2br(htmlspecialchars($_POST['sinopsis'])) ?>
        </p>
      </div>
  <?php endif; ?>

  <div class="text-end">
    <a href="formulario.php" class="btn btn-outline-primary">Volver al formulario</a>
  </div>
</div>

</body>
</html>
