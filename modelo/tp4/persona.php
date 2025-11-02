<?php
require_once __DIR__ . "../../../configuracion.php";

class Persona {
    private $NroDni;
    private $Nombre;
    private $Apellido;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $estadoPersona;
    public $objPdo;
    private $colAutos;

    public function __construct($objPdo = null) {
        $this->NroDni = "";
        $this->Nombre = "";
        $this->Apellido = "";
        $this->fechaNac = null;
        $this->Telefono = "";
        $this->Domicilio = "";
        $this->estadoPersona = 1; // activo
        $this->objPdo = $objPdo ?? new BDinfoautos();
        $this->colAutos = [];
    }

    // Getters y Setters
    public function getNroDni() { return $this->NroDni; }
    public function getNombre() { return $this->Nombre; }
    public function getApellido() { return $this->Apellido; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTelefono() { return $this->Telefono; }
    public function getDomicilio() { return $this->Domicilio; }
    public function getEstadoPersona() { return $this->estadoPersona; }
    public function getColAutos() { return $this->colAutos; }

    public function setNroDni($val) { $this->NroDni = $val; }
    public function setNombre($val) { $this->Nombre = $val; }
    public function setApellido($val) { $this->Apellido = $val; }
    public function setFechaNac($val) { $this->fechaNac = $val; }
    public function setTelefono($val) { $this->Telefono = $val; }
    public function setDomicilio($val) { $this->Domicilio = $val; }
    public function setEstadoPersona($val) { $this->estadoPersona = $val; }
    public function setColAutos($val) { $this->colAutos = $val; }

    // Insertar persona
    public function insertar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "INSERT INTO persona (NroDni, Nombre, Apellido, fechaNac, Telefono, Domicilio, estadoPersona)
                    VALUES ('{$this->getNroDni()}', '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getFechaNac()}', '{$this->getTelefono()}', '{$this->getDomicilio()}', {$this->getEstadoPersona()})";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Borrado lógico
    public function eliminar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE persona SET estadoPersona = 0 WHERE NroDni = '{$this->getNroDni()}'";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Modificar persona
    public function modificar() {
        $resultado = -1;
        if ($this->objPdo->Iniciar()) {
            $sql = "UPDATE persona 
                    SET Nombre='{$this->getNombre()}', Apellido='{$this->getApellido()}', fechaNac='{$this->getFechaNac()}', Telefono='{$this->getTelefono()}', Domicilio='{$this->getDomicilio()}'
                    WHERE NroDni='{$this->getNroDni()}' AND estadoPersona = 1";
            $resultado = $this->objPdo->Ejecutar($sql);
        }
        return $resultado;
    }

    // Buscar persona por DNI
    public function buscar($dniABuscar) {
        $resultado = 0;
        $dniABuscar = trim($dniABuscar);

        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM persona WHERE TRIM(CAST(NroDni AS CHAR)) = '{$dniABuscar}' AND estadoPersona = 1";
            $this->objPdo->Ejecutar($sql);
            $fila = $this->objPdo->Registro();

            if ($fila) {
                $this->setNroDni($fila['NroDni']);
                $this->setNombre($fila['Nombre']);
                $this->setApellido($fila['Apellido']);
                $this->setFechaNac($fila['fechaNac']);
                $this->setTelefono($fila['Telefono']);
                $this->setDomicilio($fila['Domicilio']);
                $this->setEstadoPersona($fila['estadoPersona']);
                $resultado = 1;
            }
        }
        return $resultado;
    }


    // Listar todas las personas activas
    public function listar() {
        $personas = [];
        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT * FROM persona WHERE estadoPersona = 1";
            $cant = $this->objPdo->Ejecutar($sql);
            if ($cant > 0) {
                while ($fila = $this->objPdo->Registro()) {
                    $personas[] = $fila;
                }
            }
        }
        return $personas;
    }

    // Agregar auto a la coleccion 
    public function agregarAuto($auto) {
        $resultado = false;

        if ($auto instanceof Auto) {
            $existe = false;
            foreach ($this->colAutos as $a) {
                if ($a->getPatente() === $auto->getPatente()) {
                    $existe = true;
                }
            }
            if (!$existe) {
                $this->colAutos[] = $auto;
                $resultado = true;
            }
        }

        return $resultado;
    }


}
?>
