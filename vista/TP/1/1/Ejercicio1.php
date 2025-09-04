<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Formulario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Ingrese un número</h3>

        <form name="form1" id="form1" method="POST" action="vernumero.php">
            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="number" class="form-control" name="numero" id="numero" required>
                <span id="mensaje-error"></span>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php'
?>
</body>
</html>


