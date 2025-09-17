<?php
include_once '../../../../modelo/tp4/persona.php';

class ControlPersona {
    private $objPdo;

    public function __construct() {
        $this->objPdo = new BaseDatos();
    }

    // Devuelve todas las personas activas
    public function listarPersonas() {
        $personas = [];
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM Persona WHERE estadoPersona = TRUE";
            $cant = $this->objPdo->Ejecutar($sql);
            if ($cant > 0) {
                while ($fila = $this->objPdo->Registro()) {
                    $personas[] = $fila;
                }
            }
        }
        return $personas;
    }

    // Devuelve una persona por DNI
    public function obtenerPersona($dni) {
        $persona = new Persona($this->objPdo);
        if ($persona->buscar($dni) > 0) {
            return $persona;
        }
        return null;
    }
}
?>
