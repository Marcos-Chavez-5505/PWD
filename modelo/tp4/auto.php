<?php

include_once __DIR__ . '../../conector/conector.php';
include_once __DIR__ . '../../tp4/persona.php';

class Auto {
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio; // a partir de este se obtiene el dni
    private $estadoAuto;
    private $objPdo;

    public function __construct($objPdo) {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = "";
        $this->estadoAuto = true;
        $this->objPdo = $objPdo ?? new BaseDatos();
    }

    // getters
    public function getPatente() { return $this->patente; }
    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getObjDuenio() { return $this->objDuenio; }
    public function getEstadoAuto() { return $this->estadoAuto; }
    public function getObjPdo() { return $this->objPdo; }

    // setters
    public function setPatente($patente) { $this->patente = $patente; }
    public function setMarca($marca) { $this->marca = $marca; }
    public function setModelo($modelo) { $this->modelo = $modelo; }
    public function setObjDuenio($objDuenio) { $this->objDuenio = $objDuenio; }
    public function setEstadoAuto($estadoAuto) { $this->estadoAuto = $estadoAuto; }
    public function setObjPdo($objPdo) { $this->objPdo = $objPdo; }

    public function insertar(){
        $resultado = -1;
        if ($this->getObjPdo()->iniciar()){
            $sql = "INSERT INTO Auto (patente, marca, modelo, DniDuenio, estadoAuto)
                    VALUES (
                        '{$this->getPatente()}',
                        '{$this->getMarca()}',
                        '{$this->getModelo()}',
                        '{$this->getObjDuenio()->getNroDni()}',
                        '{$this->getEstadoAuto()}'  -- <-- Agregar este valor
                    )";
            $resultado = $this->getObjPdo()->Ejecutar($sql);
        }

        return $resultado;
    }

    public function modificar() {
        $resultado = -1;
        if ($this->getObjPdo()->iniciar()) {
            $sql = "UPDATE Auto 
                    SET Marca = '{$this->getMarca()}', 
                        Modelo = '{$this->getModelo()}',
                        DniDuenio = '{$this->getObjDuenio()->getNroDni()}'
                    WHERE Patente = '{$this->getPatente()}' AND estadoAuto = TRUE";
            $resultado = $this->getObjPdo()->Ejecutar($sql);
        }

        return $resultado;
    }

    public function eliminar() {
        $resultado = -1;
        if ($this->getObjPdo()->Iniciar()) {
            $sql = "UPDATE Auto SET estadoAuto = FALSE WHERE Patente = '{$this->getPatente()}'";
            $resultado = $this->getObjPdo()->Ejecutar($sql);
        }
        return $resultado;        
    }

    public function buscar($patenteABuscar) {
        $resultado = false;

        if ($this->getObjPdo()->Iniciar()) {
            $sql = "SELECT v.Patente, v.Marca, v.Modelo, v.estadoAuto,
                           p.nroDni, p.nombre, p.apellido, p.fechaNac, p.telefono, p.domicilio, p.estadoPersona
                    FROM auto v
                    INNER JOIN persona p ON v.DniDuenio = p.nroDni
                    WHERE v.Patente = '{$patenteABuscar}' AND v.estadoAuto = TRUE";

            if ($this->getObjPdo()->Ejecutar($sql)) {
                if ($fila = $this->getObjPdo()->Registro()) {

                    // Setear atributos del Auto
                    $this->setPatente($fila['Patente']);
                    $this->setMarca($fila['Marca']);
                    $this->setModelo($fila['Modelo']);
                    $this->setEstadoAuto($fila['estadoAuto']);

                    // Crear y setear el dueño
                    $duenio = new Persona($this->getObjPdo());
                    $duenio->setNroDni($fila['nroDni']);
                    $duenio->setNombre($fila['nombre']);
                    $duenio->setApellido($fila['apellido']);
                    $duenio->setFechaNac($fila['fechaNac']);
                    $duenio->setTelefono($fila['telefono']);
                    $duenio->setDomicilio($fila['domicilio']);
                    $duenio->setEstadoPersona($fila['estadoPersona']);

                    $this->setObjDuenio($duenio);

                    $resultado = true;
                }
            }
        }

        return $resultado;
    }
}
?>
