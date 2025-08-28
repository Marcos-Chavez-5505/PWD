<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cinem@s - Carga de Películas</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Parsley -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
  <link rel="stylesheet" href="estilos.css">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-light">
      <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Cinem@s</h5>
    </div>
    <div class="card-body">
      <form action="pelicula.php" method="POST" data-parsley-validate>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Actores</label>
            <input type="text" class="form-control" name="actores" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Director</label>
            <input type="text" class="form-control" name="director" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Guión</label>
            <input type="text" class="form-control" name="guion" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Producción</label>
            <input type="text" class="form-control" name="produccion" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Año</label>
            <input type="text" class="form-control" name="anio" maxlength="4" required
                   data-parsley-type="digits" data-parsley-maxlength="4">
          </div>
          <div class="col-md-3">
            <label class="form-label">Duración (min)</label>
            <input type="text" class="form-control" name="duracion" maxlength="3" required
                   data-parsley-type="digits" data-parsley-maxlength="3">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Restricciones de edad</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="restriccion" value="Todo Público" required>
              <label class="form-check-label">Todo Público</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="restriccion" value="Mayores de 7 años">
              <label class="form-check-label">Mayores de 7 años</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="restriccion" value="Mayores de 18 años">
              <label class="form-check-label">Mayores de 18 años</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Sinopsis</label>
          <textarea class="form-control" name="sinopsis" rows="3" required></textarea>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary me-2">Enviar</button>
          <button type="reset" class="btn btn-secondary">Borrar</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
</body>
</html>
