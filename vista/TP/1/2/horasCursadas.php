<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php 
include_once __DIR__ . "../../../../../control/1/controlEj2.php";
include_once '../../../estructura/header.php';

// Capturamos las horas desde GET
$horas = $_GET ?? [];

// Creamos instancia de la clase
$control = new horasCursadas();
$total = $control->sumarHoras($horas);
?>
<main class="d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow-lg p-5 text-center rounded-4" style="max-width: 500px;">
    <h2 class="text-primary mb-4">Resultado</h2>

    <p class="fs-4 fw-semibold">
      Horas totales cursadas: 
      <span class="text-success"><?= $total ?></span>
    </p>

    <div class="mt-4">
      <a href="javascript:history.back()" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver al Formulario
      </a>
    </div>
  </div>
</main>
<?php
include_once '../../../estructura/footer.php';
?>