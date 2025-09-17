<?php
include_once __DIR__ . '../../conector/conector.php';
class Persona{
    private $nroDni;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $objPdo; //Representa un objeto de la clase pdo
    private $colVehiculos;
    public function __construct($objPdo) {
        $this->nroDni = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->objPdo = $objPdo;
        $this->colVehiculos = [];
    }

    // Getters
    public function getNroDni() { return $this->nroDni; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTelefono() { return $this->telefono; }
    public function getDomicilio() { return $this->domicilio; }
    public function getObjPdo() { return $this->objPdo; }
    public function getcolVehiculos() { return $this->colVehiculos; }

    // Setters
    public function setNroDni($nroDni) { $this->nroDni = $nroDni; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setFechaNac($fechaNac) { $this->fechaNac = $fechaNac; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDomicilio($domicilio) { $this->domicilio = $domicilio; }
    public function setObjPdo($pdo) { $this->objPdo = $pdo; }
    public function setColVehiculos($colVehiculos) { $this->colVehiculos = $colVehiculos; }

    /**
     * Esta funcion utiliza las variables ya seteadas y manda el sql a el conector para que se ejecute, devuelve un numero
     * positivo que indica que el insert fue exitoso y es el numero de id que se uso si el campo es AUTO_INCREMENT
     * caso opuesto devuelve -1
     * @return int
     */
    public function insertar(){
        $sql = "INSERT INTO Persona (nroDni, nombre, apellido, fechaNac, telefono, domicilio)
                VALUES ('{$this->getNroDni()}', '{$this->getNombre()}', '{$this->getApellido()}',
                        '{$this->getFechaNac()}', '{$this->getTelefono()}', '{$this->getDomicilio()}')";
        $bd = new BaseDatos;
        if ($bd->Iniciar()){
            $idInsertado = $bd->Ejecutar($sql);
        }

        return $idInsertado;
    }


    // public function eliminar() NECESITA BORRADO LOGICO???? si necesita borrado logico hay que añadir una propiedad mas

    /**
     * Una funcion que dado un id (que va a estar seteado) modifica el registro que tenga la misma id
     */
    public function modificar(){
        $sql = "UPDATE Persona 
        SET nombre='{$this->getNombre()}', apellido='{$this->getApellido()}',
            fechaNac='{$this->getFechaNac()}', telefono='{$this->getTelefono()}', domicilio='{$this->getDomicilio()}'
        WHERE nroDni={$this->getNroDni()}";

        $bd = new BaseDatos;
        if ($bd->Iniciar()){
            $filasAfectadas = $bd->Ejecutar($sql);
        }

        return $filasAfectadas;
    }

    /**
     * este es el equivalente al select
     */
    public function buscar($dniABuscar){
        $sql = "SELECT * FROM Persona WHERE nroDni='{$dniABuscar}'";

        $bd = new BaseDatos;
        if ($bd->Iniciar()){
            $cantRegistros = $bd->Ejecutar($sql);
        }

        return $cantRegistros;
    }



}

?>