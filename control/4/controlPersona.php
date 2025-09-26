<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/modelo/tp4/persona.php';

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

    public function insertarPersona($datos) {
        $persona = new Persona($this->objPdo);

        $persona->setNroDni($datos['nroDni']);
        $persona->setNombre($datos['nombre']);
        $persona->setApellido($datos['apellido']);
        $persona->setFechaNac($datos['fechaNac']);
        $persona->setTelefono($datos['telefono']);
        $persona->setDomicilio($datos['domicilio']);

        $resultado = 0;

        $existe = $persona->buscar($persona->getNroDni());

        if ($existe == 0) { 
            $insertar = $persona->insertar();
            $resultado = $insertar ? 1 : 0; 
        } else {
            $resultado = -1; 
        }

        return $resultado; 
    }

    public function modificarPersona($datos){
        $persona = new Persona($this->objPdo);
        
        $resultado = 0; 
        
        $existe = $persona->buscar($datos['nroDni']);
        
        if ($existe == 1) {
            $persona->setNroDni($datos['nroDni']);
            $persona->setNombre($datos['nombre']);
            $persona->setApellido($datos['apellido']);
            $persona->setFechaNac($datos['fechaNac']);
            $persona->setTelefono($datos['telefono']);
            $persona->setDomicilio($datos['domicilio']);

            $modificar = $persona->modificar();
            switch ($modificar){
                case -1:
                    $resultado = -1;
                    break;
                case 0:
                    $resultado = 0;
                    break;
                default:
                    $resultado = 1;
                    break;
            }
        } else {
            $resultado = -1; 
        }

        return $resultado; 
    }



}
?>
