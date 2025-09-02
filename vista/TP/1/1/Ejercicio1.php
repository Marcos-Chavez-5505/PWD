<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--le aplicamos estilos al mensaje de error en el formulario-->
    <style>
        #mensaje-error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
    
<body><!--aca le damos un fondo gris claro-->
<?php
include_once '../../../estructura/header.php'
?>
<main>
<!--centramos horizontal y vertical y hacemos que el formulario quede centrado-->
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;"><!--creamos una tarjeta rectangular y la ajustamos al ancho del contenedor-->
        <h3 class="text-center mb-4">Ingrese un número</h3><!--centramos el texto-->

        <form name="form1" id="form1" method="POST" action="vernumero.php">
            <div class="mb-3"><!--agregamos un marguen inferior-->
                <label for="numero" class="form-label">Número:</label><!--estilo label de Broostrap-->
                <input type="number" class="form-control" name="numero" id="numero" required>
                <span id="mensaje-error"></span>
            </div>

            <div class="d-grid gap-2"><!--hacemos que el boton ocupe otodo el ancho y haya un pequeño espacio entre elementos-->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</main>
</body>
<?php
include_once '../../../estructura/footer.php'
?>
</html>


