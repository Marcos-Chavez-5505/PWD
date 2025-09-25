<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-4 rounded shadow-sm" style="width: 500px;">
        <h3 class="mb-3 text-center">Ingrese sus datos</h3>

        <form name="formulario5" id="formulario5" method="POST" action="/PWD/vista/action/action.php">
            <input type="text" hidden name="accion" value="mostrarDatos5">
            <!--Seccion del nombre-->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <!--Seccion del apellido-->
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required>
            </div>
            <!--Seccion de la edad-->
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="edad" id="edad" min="0" required>
            </div>
            <!--Seccion de la direccion-->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" required>
            </div>
            <!--Seccion del nivel de estudio-->
            <div class="mb-3">
                <label class="form-label">¿Cuál es su nivel de estudio?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="opcion1" name="nivelEstudio" value="No tiene estudios" required>
                    <label class="form-check-label" for="opcion1">1 - No tiene estudios</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="opcion2" name="nivelEstudio" value="Estudios Primarios">
                    <label class="form-check-label" for="opcion2">2 - Estudios Primarios</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="opcion3" name="nivelEstudio" value="Estudios Secundarios">
                    <label class="form-check-label" for="opcion3">3 - Estudios Secundarios</label>
                </div>
            </div>
            <!--Seccion del Genero-->
            <div class="mb-3">
                <label for="opcion" class="form-label">Indique su género</label>
                <select class="form-select" name="opcion" id="opcion" required>
                    <option value="">Seleccione género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Prefiero no Decirlo">Prefiero no decirlo</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</main>
<script src="../../../js/validator.js"></script>
<?php
include_once '../../../estructura/footer.php'
?>    
</body>
</html>