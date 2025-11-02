<?php
require_once __DIR__ . "../../../configuracion.php";
class ControlAuto {
    private $objPdo;

    public function __construct() {
        $this->objPdo = new BDinfoautos();
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


    // Devuelve un auto por patente
    public function obtenerAuto($patente) {
        $auto = new Auto($this->objPdo);
        $resultado = null;
        if ($auto->buscar($patente)) {
            $resultado = $auto;
        }
        return $resultado;
    }

    // Compara DNI con patente (dni duenio) de un auto
    public function perteneceDuenio($patente, $dni){
        $resultado = false;
        $auto = $this->obtenerAuto($patente);
        if ($auto != null){
            if ($auto->getObjDuenio()->getNroDni() === $dni){
                $resultado = true;
            }
        }
        return $resultado;
    }

    // Cambia duenio del auto
    public function cambiarDuenio($patente, $persona){
        $resultado = false;
        $auto = $this->obtenerAuto($patente);
        if ($auto != null){
            if ($persona != null){
                $auto->setObjDuenio($persona);
                if ($auto->modificar() != -1){
                    $resultado = true;
                }
            }
        }
        return $resultado;
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

    // Listar todos los autos
    public function listarTodosLosAutos() {
        $autos = [];

        if ($this->objPdo->Iniciar()) {
            $sql = "SELECT v.Patente, v.Marca, v.Modelo, v.estadoAuto,
                        p.nroDni, p.nombre, p.apellido
                    FROM auto v
                    INNER JOIN persona p ON v.DniDuenio = p.nroDni
                    WHERE v.estadoAuto = TRUE"; // solo autos activos

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
