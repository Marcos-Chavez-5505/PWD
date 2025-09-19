<?php
include_once __DIR__ . '../../conector/conector.php';

class Persona {
    private $NroDni;
    private $Nombre;
    private $Apellido;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $estadoPersona;
    public $objPdo;
    private $colVehiculos;

    public function __construct($objPdo = null) {
        $this->NroDni = "";
        $this->Nombre = "";
        $this->Apellido = "";
        $this->fechaNac = null;
        $this->Telefono = "";
        $this->Domicilio = "";
        $this->estadoPersona = 1; // activo
        $this->objPdo = $objPdo ?? new BaseDatos();
        $this->colVehiculos = [];
    }

    // Getters y Setters
    public function getNroDni() { return $this->NroDni; }
    public function getNombre() { return $this->Nombre; }
    public function getApellido() { return $this->Apellido; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTelefono() { return $this->Telefono; }
    public function getDomicilio() { return $this->Domicilio; }
    public function getEstadoPersona() { return $this->estadoPersona; }
    public function getColVehiculos() { return $this->colVehiculos; }

    public function setNroDni($val) { $this->NroDni = $val; }
    public function setNombre($val) { $this->Nombre = $val; }
    public function setApellido($val) { $this->Apellido = $val; }
    public function setFechaNac($val) { $this->fechaNac = $val; }
    public function setTelefono($val) { $this->Telefono = $val; }
    public function setDomicilio($val) { $this->Domicilio = $val; }
    public function setEstadoPersona($val) { $this->estadoPersona = $val; }
    public function setColVehiculos($val) { $this->colVehiculos = $val; }

    // Insertar persona
    public function insertar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "INSERT INTO Persona (NroDni, Nombre, Apellido, fechaNac, Telefono, Domicilio, estadoPersona)
                    VALUES ('{$this->NroDni}', '{$this->Nombre}', '{$this->Apellido}', '{$this->fechaNac}', '{$this->Telefono}', '{$this->Domicilio}', {$this->estadoPersona})";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Borrado lógico
    public function eliminar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE Persona SET estadoPersona = 0 WHERE NroDni = '{$this->NroDni}'";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Modificar persona
    public function modificar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE Persona 
                    SET Nombre='{$this->Nombre}', Apellido='{$this->Apellido}', fechaNac='{$this->fechaNac}', Telefono='{$this->Telefono}', Domicilio='{$this->Domicilio}'
                    WHERE NroDni='{$this->NroDni}' AND estadoPersona = 1";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Buscar persona por DNI
    public function buscar($dniABuscar) {
        $resultado = 0;
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM Persona WHERE NroDni='{$dniABuscar}' AND estadoPersona = 1";
            $cant = $this->objPdo->Ejecutar($sql);
            if ($cant > 0) {
                $fila = $this->objPdo->Registro();
                if ($fila) {
                    $this->NroDni = $fila['NroDni'];
                    $this->Nombre = $fila['Nombre'];
                    $this->Apellido = $fila['Apellido'];
                    $this->fechaNac = $fila['fechaNac'];
                    $this->Telefono = $fila['Telefono'];
                    $this->Domicilio = $fila['Domicilio'];
                    $this->estadoPersona = $fila['estadoPersona'];
                    $resultado = 1;
                }
            }
        }
        return $resultado;
    }

    // Listar todas las personas activas
    public function listar() {
        $personas = [];
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM Persona WHERE estadoPersona = 1";
            $cant = $this->objPdo->Ejecutar($sql);
            if ($cant > 0) {
                while ($fila = $this->objPdo->Registro()) {
                    $personas[] = $fila;
                }
            }
        }
        return $personas;
    }
}
?>
