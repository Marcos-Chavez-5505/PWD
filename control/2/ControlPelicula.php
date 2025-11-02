<?php
// ControlPelicula.php
class ControlPelicula {
    // Valida los datos de una película
    public function validarPelicula(array $data): array {
        $errores = [];

        // Título obligatorio
        if (empty($data['titulo']) || strlen(trim($data['titulo'])) < 2) {
            $errores[] = "El título es obligatorio y debe tener al menos 2 caracteres.";
        }

        // Actores obligatorio
        if (empty($data['actores'])) {
            $errores[] = "Debe ingresar al menos un actor.";
        }

        // Director obligatorio
        if (empty($data['director'])) {
            $errores[] = "El director es obligatorio.";
        }

        // Guion obligatorio
        if (empty($data['guion'])) {
            $errores[] = "El guion es obligatorio.";
        }

        // Producción obligatorio
        if (empty($data['produccion'])) {
            $errores[] = "La producción es obligatoria.";
        }

        // Año: debe ser número de 4 cifras razonable
        if (empty($data['anio']) || !is_numeric($data['anio']) || $data['anio'] < 1888 || $data['anio'] > date("Y")) {
            $errores[] = "El año debe ser un número válido (1888 - " . date("Y") . ").";
        }

        // Nacionalidad obligatoria
        if (empty($data['nacionalidad'])) {
            $errores[] = "La nacionalidad es obligatoria.";
        }

        // Género obligatorio
        if (empty($data['genero'])) {
            $errores[] = "Debe seleccionar un género.";
        }

        // Duración: debe ser número positivo
        if (empty($data['duracion']) || !is_numeric($data['duracion']) || $data['duracion'] <= 0) {
            $errores[] = "La duración debe ser un número mayor a 0.";
        }

        // Restricción obligatoria
        if (empty($data['restriccion'])) {
            $errores[] = "Debe seleccionar una restricción de edad.";
        }

        // Sinopsis obligatoria
        if (empty($data['sinopsis']) || strlen(trim($data['sinopsis'])) < 10) {
            $errores[] = "La sinopsis es obligatoria y debe tener al menos 10 caracteres.";
        }

        return $errores;
    }
}
?>
