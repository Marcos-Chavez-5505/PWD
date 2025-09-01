<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo1.css">
    <title>Ejercicio 1</title>
</head>
<body>
    <div class="form-container">
        <form id="form-numero" method="POST" action="vernumero.php">
            <div class="elementos-form">
                <div class="titulo">
                    <h3>Ingrese por favor un número</h3>
                </div>

                <input type="text" name="numero" id="numero">
                <br>
                <span id="mensaje-error" class="error"></span>

                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <script src="../../../validator.js"></script>
</body>
</html>
