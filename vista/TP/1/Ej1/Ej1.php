<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo1.css">
    <title>Ejercicio 1</title>
</head>
<body>
    <div class="form-conteiner">
    <form name ="form1" id="form1" method="POST" action="vernumero.php">
        <div class="elementos-form">
        <div class="titulo">
        <h3>Ingrese por favor un numero</h3>
        </div>
        <input type="text" name="numero" id="numero" > <br>
        <span id="mensaje-error"></span>

        <input type="submit" name="Submit" value="Enviar">
        </div>
    </form>
    </div>

    <script src="../../../validador.js"></script>
</body>
</html>