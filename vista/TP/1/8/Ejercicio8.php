<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%; margin: 60px;">
        <h2 class="mb-4 text-center">Calculadora de Entradas</h2>
        <form name="form8" id="form8" method="post" action="/PWD/vista/action/action.php">
            <input type="text" hidden name="accion" value="precioBoleto">
            
            <!-- Edad -->
            <div class="mb-3">
                <label for="edad" class="form-label">Ingrese su edad:</label>
                <input type="number" class="form-control" name="edad" id="edad" required min="0">
            </div>

            <!-- Estudiante -->
            <div class="mb-3">
                <label class="form-label">¿Eres estudiante?</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="opcionSi" name="estudiante" value="si" required>
                    <label class="form-check-label" for="opcionSi">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="opcionNo" name="estudiante" value="no" required>
                    <label class="form-check-label" for="opcionNo">No</label>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <input type="submit" class="btn btn-primary" name="Submit" id="submit" value="Enviar">
                <input type="reset" class="btn btn-secondary" name="Reset" id="reset" value="Limpiar Datos">
            </div>

        </form>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php'
?>
</body>
</html>