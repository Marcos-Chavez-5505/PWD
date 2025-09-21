<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD/modelo/tp4/auto.php';

class ControlCambioDuenio {
    private $objPdo;

    public function __construct() {
        $this->objPdo = new BaseDatos();
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
        $auto = new Auto($this->objPdo);
        $resultado = false;
        if ($auto->buscar($patente)){
            if ($auto->getObjDuenio()->getNroDni() == $dni){
                $resultado = true;
            }
        }
        return $resultado;
    }

    // Cambia duenio del auto
    public function cambiarDuenio($patente, $dni){
        $auto = new Auto($this->objPdo);
        $resultado = false;
        if ($auto->buscar($patente)){
            $persona = new Persona($this->objPdo);
            if ($persona->buscar($dni) < 0){
                $auto->setObjDuenio($persona);
                if ($auto->modificar() != -1){
                    $resultado = true;
                }
            }
        }
        return $resultado;
    }

}
?>
