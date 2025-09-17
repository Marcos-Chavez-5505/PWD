<?php
include_once __DIR__ . '../../conector/conector.php';

class Persona {
    private $nroDni;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $estadoPersona;
    public $objPdo;
    private $colVehiculos;

    public function __construct($objPdo = null) {
        $this->nroDni = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->estadoPersona = true;
        $this->objPdo = $objPdo ?? new BaseDatos();
        $this->colVehiculos = [];
    }

    // Getters y Setters
    public function getNroDni() { return $this->nroDni; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTelefono() { return $this->telefono; }
    public function getDomicilio() { return $this->domicilio; }
    public function getEstadoPersona() { return $this->estadoPersona; }
    public function getColVehiculos() { return $this->colVehiculos; }

    public function setNroDni($nroDni) { $this->nroDni = $nroDni; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setFechaNac($fechaNac) { $this->fechaNac = $fechaNac; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDomicilio($domicilio) { $this->domicilio = $domicilio; }
    public function setEstadoPersona($estadoPersona) { $this->estadoPersona = $estadoPersona; }
    public function setColVehiculos($colVehiculos) { $this->colVehiculos = $colVehiculos; }

    // Insertar persona
    public function insertar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "INSERT INTO Persona (nroDni, nombre, apellido, fechaNac, telefono, domicilio, estadoPersona)
                    VALUES ('{$this->nroDni}', '{$this->nombre}', '{$this->apellido}', '{$this->fechaNac}', '{$this->telefono}', '{$this->domicilio}', {$this->estadoPersona})";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Borrado lógico
    public function eliminar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE Persona SET estadoPersona = FALSE WHERE nroDni = '{$this->nroDni}'";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Modificar persona
    public function modificar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE Persona 
                    SET nombre='{$this->nombre}', apellido='{$this->apellido}', fechaNac='{$this->fechaNac}', telefono='{$this->telefono}', domicilio='{$this->domicilio}'
                    WHERE nroDni='{$this->nroDni}' AND estadoPersona = TRUE";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Buscar persona por DNI
    public function buscar($dniABuscar) {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM Persona WHERE nroDni='{$dniABuscar}' AND estadoPersona = TRUE";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    
}

// Es mejor retornar -1 en estas funciones por si hay algun error 
?>

