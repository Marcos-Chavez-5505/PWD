<?php
include_once __DIR__ . "../../../control/valorEncapsulado.php";
$encapsulamiento = new ValorEncapsulado; //usen esto para agarrar los campos

$accion = $encapsulamiento->obtenerValor('accion');

switch ($accion){
    //----------------------------------------TP1----------------------------------------\\
    case 'verNumero':   //EJERCICIO 1 TP1
        include_once __DIR__ . "../../../control/1/controlEj1.php";
        $validador = new verNumero();

        $numero    = $encapsulamiento->obtenerValor('numero');
        $mensaje   = '';
        $tieneDato = ($numero !== '');
        if ($tieneDato) {
            $mensaje = $validador->validarNumero($numero);
        }

        include_once __DIR__ . "../../TP/1/1/vernumero.php";
        break;
    case 'horasCursadas':   //EJERCICIO 2 TP1
        include_once __DIR__ . "../../../control/1/controlEj2.php";
        $control = new horasCursadas();

        // Capturamos las horas de cada día
        $horas = [
            'lunes'     => (int) $encapsulamiento->obtenerValor('lunes'),
            'martes'    => (int) $encapsulamiento->obtenerValor('martes'),
            'miercoles' => (int) $encapsulamiento->obtenerValor('miercoles'),
            'jueves'    => (int) $encapsulamiento->obtenerValor('jueves'),
            'viernes'   => (int) $encapsulamiento->obtenerValor('viernes')
        ];
        $total = $control->sumarHoras($horas);

        include_once __DIR__ . "../../TP/1/2/horasCursadas.php";
        break;
    case 'mostrarDatos':   //EJERCICIO 3 TP1
        $nombre   = $encapsulamiento->obtenerValor('nombre');
        $apellido = $encapsulamiento->obtenerValor('apellido');
        $edad     = $encapsulamiento->obtenerValor('edad');
        $direccion= $encapsulamiento->obtenerValor('direccion');
        include_once __DIR__ . "../../TP/1/3/mostrarDatos3.php";
        break;
    case 'mostrarDatos4':   //EJERCICIO 4 TP1
        include_once __DIR__ . "../../../control/1/controlEj4.php";

        // Capturamos los datos usando la función
        $nombre    = $encapsulamiento->obtenerValor('nombre');
        $apellido  = $encapsulamiento->obtenerValor('apellido');
        $edad      = $encapsulamiento->obtenerValor('edad');
        $direccion = $encapsulamiento->obtenerValor('direccion');

        // Instancia de la clase Edad
        $edadObj = new Edad();
        $mensajeEdad = $edad !== '' ? $edadObj->generarMensaje((int)$edad) : '';

        include_once __DIR__ . "../../TP/1/4/mostrarDatos4.php";
        break;
    case 'mostrarDatos5':   //EJERCICIO 5 TP1

        // Capturamos los datos usando la función
        $nombre       = $encapsulamiento->obtenerValor('nombre');
        $apellido     = $encapsulamiento->obtenerValor('apellido');
        $edad         = $encapsulamiento->obtenerValor('edad');
        $direccion    = $encapsulamiento->obtenerValor('direccion');
        $nivelEstudio = $encapsulamiento->obtenerValor('nivelEstudio');
        $genero       = $encapsulamiento->obtenerValor('opcion');
        include_once __DIR__ . "../../TP/1/5/mostrarDatos5.php";
        break;
    case 'mostrarDatos6':   //EJERCICIO 6 TP1
        
        // Capturamos los datos usando la función
        $nombre       = $encapsulamiento->obtenerValor('nombre');
        $apellido     = $encapsulamiento->obtenerValor('apellido');
        $edad         = $encapsulamiento->obtenerValor('edad');
        $direccion    = $encapsulamiento->obtenerValor('direccion');
        $nivelEstudio = $encapsulamiento->obtenerValor('nivelEstudio');
        $genero       = $encapsulamiento->obtenerValor('opcion');

        // Capturamos los deportes como array 
        $deportes = [];
        if (isset($_POST['deportes']) && is_array($_POST['deportes'])) {
            $deportes = $_POST['deportes'];
        } elseif (isset($_GET['deportes']) && is_array($_GET['deportes'])) {
            $deportes = $_GET['deportes'];
        }
        $cantDepo = count($deportes);   //y contamos cuantos deportes hay

        //esta parte es para imprimir por pantalla los deportes que se eligieron
        $listDeportes = "";
        $listDeportesFinal = end($deportes);
        foreach ($deportes as $deporte){
            if ($deporte == $listDeportesFinal){
                $listDeportes .= $deporte . ".";
            }else{
                $listDeportes .= $deporte . ", ";
            }
        }
        include_once __DIR__ . "../../TP/1/6/mostrarDatos6.php";
        break;
    case 'resultado': //EJERCICO 7 TP1
        include_once __DIR__ . "../../../control/1/controlEj7.php";

        // Capturamos los datos usando la función
        $num1      = $encapsulamiento->obtenerValor('numero1', 0);
        $num2      = $encapsulamiento->obtenerValor('numero2', 0);
        $operacion = $encapsulamiento->obtenerValor('operacion', 'suma');

        $objOpe = new Operaciones();
        $resultado = $objOpe->operacion($operacion, $num1, $num2);

        // Para mostrar la operación con texto bonito
        switch($operacion){
            case "suma":
                $simbolo = "+";
                $nombreOperacion = "Suma";
                break;
            case "resta":
                $simbolo = "-";
                $nombreOperacion = "Resta";
                break;
            case "multiplicacion":
                $simbolo = "×";
                $nombreOperacion = "Multiplicación";
                break;
            default:
                $simbolo = "?";
                $nombreOperacion = "Desconocida";
        }

        include_once __DIR__ . "../../TP/1/7/resultado.php";
        break;
    case 'precioBoleto': //EJERCICIO 8 TP1
        include_once __DIR__ . "../../../control/1/controlEj8.php";
        // Capturamos los datos usando la función
        $edad       = $encapsulamiento->obtenerValor('edad', 0);
        $estudiante = $encapsulamiento->obtenerValor('estudiante', 'no');

        $entrada = new entradaCine();
        $precio = $entrada->calcularPrecio($edad, $estudiante);

        include_once __DIR__ . "../../TP/1/8/precioBoleto.php";
        break;
    //----------------------------------------TP3----------------------------------------\\
    case 'subirPdfDoc':   //EJERCICIO 1 TP3
        include_once __DIR__ . "../../../control/3/controlEJ1.php";
        $controlEJ1 = new ControlEJ1;
        $mensaje = $controlEJ1->veryfyFile();
        include_once __DIR__ . "../../TP/3/1/mostrar.php";
        break;
    case 'subirTXT':   //EJERCICIO 2 TP3
        include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/control/3/controlEJ2.php";
        $controlEJ2 = new controlEJ2;
        $mensaje = $controlEJ2->verifyFile();
        include_once __DIR__ . "/../TP/3/2/print.php";
        break;
    case 'formPelicula':   //EJERCICIO 3 TP3
        include_once __DIR__ . "/../../control/3/controlEJ3.php";
        $controlEJ3 = new controlEJ3;
        $mensaje = $controlEJ3->moveImage();
        include_once __DIR__ . "/../TP/3/3/mostrarPeli.php";
    default:
        $mensaje = "no se han encontrado datos";
}
?>