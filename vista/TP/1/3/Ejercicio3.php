<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="d-flex justify-content-center align-items-center vh-100 mt-5">
    <div class="row justify-content-center">
        <div class="bg-white p-4 rounded shadow-sm" style="width: 500px;">
            <div class="bg-white p-4 rounded shadow-sm">
                <h3 class="mb-4 text-center">Ingrese sus datos:</h3>
                <form name="formulario3" id="formulario3" method="POST" action="/PWD/vista/action/action.php">
                    <input type="text" hidden name="accion" value="mostrarDatos">
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad" required min="0">
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="../../../js/validator.js"></script>
<?php
include_once '../../../estructura/footer.php'
?>
</body>
</html>