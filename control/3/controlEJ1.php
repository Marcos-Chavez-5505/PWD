<?php

class ControlEJ1 {

    public function veryfyFile(){

        $mensaje = "No se ha seleccionado ningun archivo";
        if ($_FILES['archivo']['error'] === 0) {
            $nombre = $_FILES['archivo']['name'];
            $tmp = $_FILES['archivo']['tmp_name'];
            $size = $_FILES['archivo']['size'];
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);

            if ($ext !== 'pdf' && $ext !== 'doc') {
                $mensaje = "El archivo no es un .pdf o .doc";
            }else{
                if($size > 2 * 1024 * 1024){
                    $mensaje = "El archivo es demasiado grande";
                }else{
                    move_uploaded_file($tmp, "../../vista/TP/tp3/ej1/archivos/$nombre");
                    $mensaje = "Archivo subido con exito <a href='../../vista/TP/tp3/ej1/archivos/$nombre' target='_blank'>Ver archivo</a>";
                }
            }
        }
        return $mensaje;
    }
}


// if(empty($_FILES['archivo']) || $_FILES['archivo']['error']) {
//     echo "No se ha seleccionado ningun archivo";
// }else{
//     if($_FILES['archivo']['type'] == )
// }


?>