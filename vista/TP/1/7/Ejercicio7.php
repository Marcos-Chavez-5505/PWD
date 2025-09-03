<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h3 class="mb-3 text-center">Operaciones Matemáticas</h3>
        <form id="form7" name="form7" method="POST" action="resultado.php">
            
            <div class="mb-3">
                <label for="numero1" class="form-label">Número 1</label>
                <input type="number" class="form-control" name="numero1" id="numero1" required >
            </div>

            <div class="mb-3">
                <label for="numero2" class="form-label">Número 2</label>
                <input type="number" class="form-control" name="numero2" id="numero2" required >
            </div>

            <div class="mb-3">
                <label for="operacion" class="form-label">Operación</label>
                <select class="form-select" name="operacion" id="operacion" required>
                    <option value="">Seleccione...</option>
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicacion">Multiplicación</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Calcular</button>
                <button type="reset" class="btn btn-secondary mt-2">Limpiar</button>
            </div>
        </form>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php'
?>
</body>
</html>