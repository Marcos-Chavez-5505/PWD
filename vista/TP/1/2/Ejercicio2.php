<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main>
<div class="container mt-5">
  <div class="card shadow p-4" >
    <h2 class="mb-4 text-center">Horas de cursada</h2>

    <form name="formulario2" id="formulario2" method="GET" action="horasCursadas.php">

      <div class="mb-3">
        <label for="lunes" class="form-label">Lunes</label>
        <input type="text" class="form-control" name="lunes" id="lunes">
        <span class="error" id="error-lunes"></span>
      </div>

      <div class="mb-3">
        <label for="martes" class="form-label">Martes</label>
        <input type="text" class="form-control" name="martes" id="martes">
        <span class="error" id="error-martes"></span>
      </div>

      <div class="mb-3">
        <label for="miercoles" class="form-label">Miércoles</label>
        <input type="text" class="form-control" name="miercoles" id="miercoles">
        <span class="error" id="error-miercoles"></span>
      </div>

      <div class="mb-3">
        <label for="jueves" class="form-label">Jueves</label>
        <input type="text" class="form-control" name="jueves" id="jueves">
        <span class="error" id="error-jueves"></span>
      </div>

      <div class="mb-3">
        <label for="viernes" class="form-label">Viernes</label>
        <input type="text" class="form-control" name="viernes" id="viernes">
        <span class="error" id="error-viernes"></span>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-secondary">Limpiar</button>
      </div>

    </form>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../js/validator.js"></script>
</main>
</body>
<?php
include_once '../../../estructura/footer.php'
?>
</html>
