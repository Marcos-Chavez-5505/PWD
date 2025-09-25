<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horas Cursadas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php
include_once __DIR__ . '../../../../estructura/header.php';
?>

<main class="d-flex flex-column justify-content-center align-items-center min-vh-10">
  <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
    <h2 class="text-primary mb-4 text-center">Resultado</h2>

    <p class="fs-4 fw-semibold text-center">
      Horas totales cursadas: 
      <span class="text-success"><?= htmlspecialchars($total) ?></span>
    </p>

    <div class="d-grid gap-2 mt-4">
      <a href="/PWD/vista/TP/1/2/Ejercicio2.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Ir al formulario
      </a>
    </div>
  </div>
</main>

<?php
include_once __DIR__ . '../../../../estructura/footer.php';
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
