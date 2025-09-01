<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinem@s - Carga de Películas</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Tu CSS -->
    <link rel="stylesheet" href="../../../css/tp2.css">   
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include_once '../../../estructura/header.php'; ?>
    
    <main>
        <div class="container mt-4">
            <div class="card shadow">
                <div class="card-header bg-light">
                    <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Cinem@s</h5>
                </div>
                <div class="card-body">
                    <form id="peliculaForm" action="pelicula.php" method="POST" novalidate>
                        
                        <!-- Título -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" required>
                            <div class="invalid-feedback">El título es obligatorio y debe tener al menos 2 caracteres.</div>
                        </div>

                        <!-- Actores -->
                        <div class="mb-3">
                            <label for="actores" class="form-label">Actores</label>
                            <input type="text" class="form-control" name="actores" id="actores" required>
                            <div class="invalid-feedback">Los actores son obligatorios.</div>
                        </div>

                        <!-- Director -->
                        <div class="mb-3">
                            <label for="director" class="form-label">Director</label>
                            <input type="text" class="form-control" name="director" id="director" required>
                            <div class="invalid-feedback">El director es obligatorio.</div>
                        </div>

                        <!-- Guión -->
                        <div class="mb-3">
                            <label for="guion" class="form-label">Guión</label>
                            <input type="text" class="form-control" name="guion" id="guion" required>
                            <div class="invalid-feedback">El guion es obligatorio.</div>
                        </div>

                        <!-- Producción -->
                        <div class="mb-3">
                            <label for="produccion" class="form-label">Producción</label>
                            <input type="text" class="form-control" name="produccion" id="produccion" required>
                            <div class="invalid-feedback">La producción es obligatoria.</div>
                        </div>

                        <!-- Género -->
                        <div class="mb-3">
                            <label for="genero" class="form-label">Género</label>
                            <select class="form-select" name="genero" id="genero" required>
                                <option value="">Seleccione un género</option>
                                <option value="Acción">Acción</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Drama">Drama</option>
                                <option value="Terror">Terror</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Romance">Romance</option>
                                <option value="Ciencia Ficción">Ciencia Ficción</option>
                            </select>
                            <div class="invalid-feedback">Debe seleccionar un género.</div>
                        </div>

                        <!-- Año -->
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control" name="anio" id="anio" maxlength="4" required>
                            <div class="invalid-feedback">Ingrese un año válido de 4 dígitos.</div>
                        </div>

                        <!-- Duración -->
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duración (min)</label>
                            <input type="number" class="form-control" name="duracion" id="duracion" maxlength="3" required>
                            <div class="invalid-feedback">Ingrese una duración válida (1-3 dígitos).</div>
                        </div>

                        <!-- Nacionalidad -->
                        <div class="mb-3">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
                            <div class="invalid-feedback">La nacionalidad es obligatoria.</div>
                        </div>

                        <!-- Restricciones de edad -->
                        <div class="mb-3">
                            <label class="form-label d-block">Restricciones de edad</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="restriccion" id="restriccion1" value="Todo Público" required>
                                <label class="form-check-label" for="restriccion1">Todo Público</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="restriccion" id="restriccion2" value="Mayores de 7 años">
                                <label class="form-check-label" for="restriccion2">Mayores de 7 años</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="restriccion" id="restriccion3" value="Mayores de 18 años">
                                <label class="form-check-label" for="restriccion3">Mayores de 18 años</label>
                            </div>
                            <div class="invalid-feedback">Seleccione una restricción de edad.</div>
                        </div>

                        <!-- Sinopsis -->
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">Sinopsis</label>
                            <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" required></textarea>
                            <div class="invalid-feedback">La sinopsis es obligatoria y debe tener al menos 10 caracteres.</div>
                        </div>

                        <!-- Botones -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary me-2">Enviar</button>
                            <button type="reset" class="btn btn-secondary">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- JS de validación -->
    <script src="../../../js/validator.js"></script>

    <!-- Footer -->
    <?php include_once '../../../estructura/footer.php'; ?>
</body>
</html>
