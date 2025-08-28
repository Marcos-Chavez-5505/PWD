<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinem@s - Carga de Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/tp2.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Cinem@s</h5>
        </div>
        <div class="card-body">
            <form id="peliculaForm" action="pelicula.php" method="POST" novalidate>
                <!-- Título -->
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" required>
                    <div class="invalid-feedback">El título es obligatorio.</div>
                </div>

                <!-- Actores -->
                <div class="mb-3">
                    <label class="form-label">Actores</label>
                    <input type="text" class="form-control" name="actores" required>
                    <div class="invalid-feedback">Los actores son obligatorios.</div>
                </div>

                <!-- Director -->
                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input type="text" class="form-control" name="director" required>
                    <div class="invalid-feedback">El director es obligatorio.</div>
                </div>

                <!-- Guión -->
                <div class="mb-3">
                    <label class="form-label">Guión</label>
                    <input type="text" class="form-control" name="guion" required>
                    <div class="invalid-feedback">El guion es obligatorio.</div>
                </div>

                <!-- Producción -->
                <div class="mb-3">
                    <label class="form-label">Producción</label>
                    <input type="text" class="form-control" name="produccion" required>
                    <div class="invalid-feedback">La producción es obligatoria.</div>
                </div>

                <!-- Año -->
                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="text" class="form-control" name="anio" maxlength="4" required>
                    <div class="invalid-feedback">Ingrese un año válido de 4 dígitos.</div>
                </div>

                <!-- Duración -->
                <div class="mb-3">
                    <label class="form-label">Duración (min)</label>
                    <input type="text" class="form-control" name="duracion" maxlength="3" required>
                    <div class="invalid-feedback">Ingrese una duración válida (1-3 dígitos).</div>
                </div>

                <!-- Nacionalidad -->
                <div class="mb-3">
                    <label class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" name="nacionalidad" required>
                    <div class="invalid-feedback">La nacionalidad es obligatoria.</div>
                </div>

                <!-- Restricciones de edad -->
                <div class="mb-3">
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
                    <div class="invalid-feedback">Seleccione una restricción de edad.</div>
                </div>

                <!-- Sinopsis -->
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea class="form-control" name="sinopsis" rows="3" required></textarea>
                    <div class="invalid-feedback">La sinopsis es obligatoria.</div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary me-2">Enviar</button>
                    <button type="reset" class="btn btn-secondary">Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-validator@0.5.4/dist/js/bootstrapValidator.min.js"></script>
<script src="../../js/validator.js"></script>

</body>
</html>
