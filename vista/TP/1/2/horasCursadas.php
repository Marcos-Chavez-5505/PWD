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
include_once __DIR__ . "../../../../../control/1/controlEj2.php";
include_once '../../../estructura/header.php';

// Función para obtener valores desde GET o POST (solo un return)
function obtenerValor($campo, $default = 0) {
    $valor = $default;

    if (isset($_POST[$campo])) {
        $valor = trim($_POST[$campo]);
    } elseif (isset($_GET[$campo])) {
        $valor = trim($_GET[$campo]);
    }

    return $valor;
}

// Crear instancia de la clase
$control = new horasCursadas();

// Capturamos las horas de cada día
$horas = [
    'lunes'     => (int) obtenerValor('lunes'),
    'martes'    => (int) obtenerValor('martes'),
    'miercoles' => (int) obtenerValor('miercoles'),
    'jueves'    => (int) obtenerValor('jueves'),
    'viernes'   => (int) obtenerValor('viernes')
];

// Calculamos total
$total = $control->sumarHoras($horas);
?>

<main class="d-flex flex-column justify-content-center align-items-center min-vh-10">
  <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
    <h2 class="text-primary mb-4 text-center">Resultado</h2>

    <p class="fs-4 fw-semibold text-center">
      Horas totales cursadas: 
      <span class="text-success"><?= htmlspecialchars($total) ?></span>
    </p>

    <div class="d-grid gap-2 mt-4">
      <a href="Ejercicio2.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Ir al formulario
      </a>
    </div>
  </div>
</main>

<?php
include_once '../../../estructura/footer.php';
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
