<?php
include_once 'C:/xampp/htdocs/PWD/modelo/tp4/auto.php';
include_once 'C:/xampp/htdocs/PWD/modelo/tp4/persona.php';
class ControlAuto {
    private $objPdo;

    public function __construct() {
        $this->objPdo = new BaseDatos();
    }

    // Inserta un nuevo auto
    public function insertarAuto($datos) {
        $auto = new Auto($this->objPdo);

        $auto->setPatente($datos['patente']);
        $auto->setMarca($datos['marca']);
        $auto->setModelo($datos['modelo']);

        // Crear el objeto Persona y asignarlo como dueño
        $duenio = new Persona($this->objPdo);
        $duenio->setNroDni($datos['dniDuenio']);
        $auto->setObjDuenio($duenio);

        return $auto->insertar();
    }

    // Modificar un auto existente
    public function modificarAuto($datos) {
        $auto = new Auto($this->objPdo);

        $auto->setPatente($datos['patente']);
        $auto->setMarca($datos['marca']);
        $auto->setModelo($datos['modelo']);

        $duenio = new Persona($this->objPdo);
        $duenio->setNroDni($datos['dniDuenio']);
        $auto->setObjDuenio($duenio);

        return $auto->modificar();
    }

    // "Eliminar" un auto (marca como inactivo)
    public function eliminarAuto($patente) {
        $auto = new Auto($this->objPdo);
        $auto->setPatente($patente);
        return $auto->eliminar();
    }

    // Buscar un auto por patente
    public function buscarAuto($patente) {
        $auto = new Auto($this->objPdo);
        if ($auto->buscar($patente)) {
            return $auto; // Devuelve el objeto Auto con dueño incluido
        }
        return false;
    }

    // Listar autos de un DNI
    public function listarAutosPorDni($dni) {
        $autos = [];

        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT v.Patente, v.Marca, v.Modelo, v.estadoAuto,
                           p.nroDni, p.nombre, p.apellido
                    FROM auto v
                    INNER JOIN persona p ON v.DniDuenio = p.nroDni
                    WHERE v.DniDuenio = '{$dni}' AND v.estadoAuto = TRUE";

            $cant = $this->objPdo->Ejecutar($sql);
            if ($cant > 0) {
                while ($fila = $this->objPdo->Registro()) {
                    $autos[] = $fila;
                }
            }
        }

        return $autos;
    }
}
?>
