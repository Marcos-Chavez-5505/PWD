<?php
include_once __DIR__ . "../../../control/valorEncapsulado.php";
$encapsulamiento = new ValorEncapsulado; //usen esto para agarrar los campos

$accion = $encapsulamiento->obtenerValor('accion');

switch ($accion){
    //TP1
    case 'verNumero':
        include_once __DIR__ . "../../../control/1/controlEj1.php";
        $validador = new verNumero(); 
        $valorRecibido = new ValorEncapsulado;
        $numero    = $valorRecibido->obtenerValor('numero');
        $mensaje   = '';
        $tieneDato = ($numero !== '');
        if ($tieneDato) {
            $mensaje = $validador->validarNumero($numero);
        }
        include_once __DIR__ . "../../TP/1/1/vernumero.php";
        break;
    case 'horasCursadas':
        include_once __DIR__ . "../../../control/1/controlEj2.php";
        $control = new horasCursadas();
        $valorRecibido = new ValorEncapsulado;

        // Capturamos las horas de cada día
        $horas = [
            'lunes'     => (int) $valorRecibido->obtenerValor('lunes'),
            'martes'    => (int) $valorRecibido->obtenerValor('martes'),
            'miercoles' => (int) $valorRecibido->obtenerValor('miercoles'),
            'jueves'    => (int) $valorRecibido->obtenerValor('jueves'),
            'viernes'   => (int) $valorRecibido->obtenerValor('viernes')
        ];

        $total = $control->sumarHoras($horas);
        include_once __DIR__ . "../../TP/1/2/horasCursadas.php";
        break;
    case 'mostrarDatos':
        $valorRecibido = new ValorEncapsulado;
        $nombre   = $valorRecibido->obtenerValor('nombre');
        $apellido = $valorRecibido->obtenerValor('apellido');
        $edad     = $valorRecibido->obtenerValor('edad');
        $direccion= $valorRecibido->obtenerValor('direccion');
        include_once __DIR__ . "../../TP/1/3/mostrarDatos3.php";
        break;
    case 'mostrarDatos4':
        include_once __DIR__ . "../../../control/1/controlEj4.php";
        $valorRecibido = new ValorEncapsulado;
        // Capturamos los datos usando la función
        $nombre    = $valorRecibido->obtenerValor('nombre');
        $apellido  = $valorRecibido->obtenerValor('apellido');
        $edad      = $valorRecibido->obtenerValor('edad');
        $direccion = $valorRecibido->obtenerValor('direccion');

        // Instancia de la clase Edad
        $edadObj = new Edad();
        $mensajeEdad = $edad !== '' ? $edadObj->generarMensaje((int)$edad) : '';
        include_once __DIR__ . "../../TP/1/4/mostrarDatos4.php";
        break;
    //TP3
    case 'subirPdfDoc':
        include_once __DIR__ . "../../../control/3/controlEJ1.php";
        $controlEJ1 = new ControlEJ1;
        $mensaje = $controlEJ1->veryfyFile();
        include_once __DIR__ . "../../TP/3/1/mostrar.php";
        break;
    case 'subirTXT':
        include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/3/controlEJ2.php";
        $controlEJ2 = new controlEJ2;
        $mensaje = $controlEJ2->verifyFile();
        include_once __DIR__ . "/../TP/3/2/print.php";
        break;
    case 'formPelicula':
        include_once __DIR__ . "/../../control/3/controlEJ3.php";
        $controlEJ3 = new controlEJ3;
        $mensaje = $controlEJ3->moveImage();
        include_once __DIR__ . "/../TP/3/3/mostrarPeli.php";
    default:
        $mensaje = "no se han encontrado datos";
}
?>