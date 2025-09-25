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
        $this->objDuenio = null;  // <-- inicializado como null
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

    // Insertar nuevo auto
    public function insertar() {
        $resultado = -2; // valor por defecto

        if ($this->getObjPdo()->Iniciar()) {
            if ($this->buscar($this->getPatente())) {
                $resultado = -1; // patente ya existe
            } else {
                $dniDuenio = is_object($this->getObjDuenio())
                            ? $this->getObjDuenio()->getNroDni()
                            : null;

                $modelo = (int) $this->getModelo();
                $estado = $this->getEstadoAuto() ? 1 : 0;

                if ($dniDuenio !== null) {
                    $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio, EstadoAuto)
                            VALUES (
                                '{$this->getPatente()}',
                                '{$this->getMarca()}',
                                $modelo,
                                '{$dniDuenio}',
                                $estado
                            )";

                    $exec = $this->getObjPdo()->Ejecutar($sql);
                    if ($exec > 0 || $exec == -1) {
                        $resultado = 1;
                    }
                }
            }
        }

        return $resultado;
    }


    // Modificar un auto existente
    public function modificar() {
        $resultado = -1;

        if ($this->getObjPdo()->iniciar()) {
            $dniDuenio = is_object($this->getObjDuenio()) 
                         ? $this->getObjDuenio()->getNroDni() 
                         : null;

            $sql = "UPDATE auto 
                    SET Marca = '{$this->getMarca()}', 
                        Modelo = '{$this->getModelo()}',
                        DniDuenio = '{$dniDuenio}'
                    WHERE Patente = '{$this->getPatente()}' AND estadoAuto = TRUE";

            $exec = $this->getObjPdo()->Ejecutar($sql);
            if ($exec !== false) {
                $resultado = 1;
            }
        }

        return $resultado;
    }

    // Eliminar (marcar como inactivo)
    public function eliminar() {
        $resultado = -1;

        if ($this->getObjPdo()->Iniciar()) {
            $sql = "UPDATE auto SET estadoAuto = FALSE WHERE Patente = '{$this->getPatente()}'";
            $exec = $this->getObjPdo()->Ejecutar($sql);
            if ($exec !== false) {
                $resultado = 1;
            }
        }

        return $resultado;
    }

    // Buscar auto por patente
    public function buscar($patenteABuscar) {
        $resultado = false;

        if ($this->getObjPdo()->Iniciar()) {
            $patenteABuscar = trim(strtoupper($patenteABuscar));

            $sql = "SELECT v.Patente, v.Marca, v.Modelo, v.estadoAuto,
                           p.NroDni, p.Nombre, p.Apellido, p.fechaNac, p.Telefono, p.Domicilio, p.estadoPersona
                    FROM auto v
                    INNER JOIN persona p ON v.DniDuenio = p.NroDni
                    WHERE TRIM(UPPER(v.Patente)) = '{$patenteABuscar}' 
                    AND v.estadoAuto = TRUE";

            $this->getObjPdo()->Ejecutar($sql);
            $fila = $this->getObjPdo()->Registro();

            if ($fila) {
                $this->setPatente($fila['Patente']);
                $this->setMarca($fila['Marca']);
                $this->setModelo($fila['Modelo']);
                $this->setEstadoAuto($fila['estadoAuto']);

                $duenio = new Persona($this->getObjPdo());
                $duenio->setNroDni($fila['NroDni']);
                $duenio->setNombre($fila['Nombre']);
                $duenio->setApellido($fila['Apellido']);
                $duenio->setFechaNac($fila['fechaNac']);
                $duenio->setTelefono($fila['Telefono']);
                $duenio->setDomicilio($fila['Domicilio']);
                $duenio->setEstadoPersona($fila['estadoPersona']);

                $this->setObjDuenio($duenio);

                $resultado = true;
            }
        }

        return $resultado;
    }

    // Verifica si el auto pertenece a un dueño
    public function perteneceDuenio($patente, $dni) {
        $resultado = false;

        $auto = $this->buscar($patente) ? $this : null;

        if ($auto && is_object($this->getObjDuenio())) {
            if ($this->getObjDuenio()->getNroDni() === $dni) {
                $resultado = true;
            }
        }

        return $resultado;
    }

    // Cambiar dueño del auto
    public function cambiarDuenio($patente, $dni) {
        $resultado = false;

        $auto = $this->buscar($patente) ? $this : null;

        if ($auto) {
            $persona = new Persona($this->getObjPdo());
            if ($persona->buscar($dni)) {
                $auto->setObjDuenio($persona);
                if ($auto->modificar() === 1) {
                    $resultado = true;
                }
            }
        }

        return $resultado;
    }


}


?>
