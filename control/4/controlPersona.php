<?php
include_once '../../../../modelo/tp4/persona.php';

class ControlPersona {
    private $objPdo;

    public function __construct() {
        $this->objPdo = new BaseDatos();
    }

    // Devuelve todas las personas
    public function listarPersonas() {
        $personas = [];
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM persona";
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
        $resultado = null;
        if ($persona->buscar($dni) > 0) {
            $resultado = $persona;
        }
        return $resultado;
    }

    // Inserta una nueva persona en la BD sin duplicados
    public function insertarPersona($datos) {
        $persona = new Persona($this->objPdo);

        $persona->setNroDni($datos['nroDni']);
        $persona->setNombre($datos['nombre']);
        $persona->setApellido($datos['apellido']);
        $persona->setFechaNac($datos['fechaNac']);
        $persona->setTelefono($datos['telefono']);
        $persona->setDomicilio($datos['domicilio']);

        $resultado = -1; // Valor por defecto: error o duplicado

        // Verificar si ya existe
        if ($persona->buscar($datos['nroDni']) <= 0) {
            // Insertar si no existe
            $resultado = $persona->insertar();
        }

        return $resultado;
    }
}
?>
