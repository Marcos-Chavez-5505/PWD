<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once '../../../estructura/header.php'
?>
<main class="d-flex justify-content-center align-items-start vh-100 mt-5">
    <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
        <h3 class="mb-3 text-center">Formulario de Datos y Deportes</h3>
        <form name="formulario6" id="formulario6" method="POST" action="/PWD/vista/action/action.php">
            <input type="text" hidden name="accion" value="mostrarDatos6">
            
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

            <div class="mb-3">
                <label class="form-label">Nivel de estudio</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="opcion1" name="nivelEstudio" value="No tiene estudios" required>
                    <label class="form-check-label" for="opcion1">1 - No Tiene Estudios</label>
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

            <div class="mb-3">
                <label for="opcion" class="form-label">Género</label>
                <select class="form-select" name="opcion" id="opcion" required>
                    <option value="">Seleccione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Prefiero no Decirlo">Prefiero no decirlo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Deportes que realiza</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="deportes[]" value="Futbol" id="futbol">
                    <label class="form-check-label" for="futbol">Fútbol</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="deportes[]" value="Basket" id="basket">
                    <label class="form-check-label" for="basket">Básquet</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="deportes[]" value="Tennis" id="tennis">
                    <label class="form-check-label" for="tennis">Tenis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="deportes[]" value="Voley" id="voley">
                    <label class="form-check-label" for="voley">Vóley</label>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
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