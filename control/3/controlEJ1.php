<?php

class ControlEJ1 {

    public function veryfyFile(){

        $mensaje = "No se ha seleccionado ningun archivo";
        if ($_FILES['archivo']['error'] === 0) {
            $nombre = $_FILES['archivo']['name'];
            $tmp = $_FILES['archivo']['tmp_name'];
            $size = $_FILES['archivo']['size'];
            $extension = pathinfo($nombre, PATHINFO_EXTENSION);

            if ($extension !== 'pdf' && $extension !== 'doc') {
                $mensaje = "El archivo no es un .pdf o .doc";
            }else{
                if($size > 2 * 1024 * 1024){
                    $mensaje = "El archivo es demasiado grande";
                }else{
                    move_uploaded_file($tmp, __DIR__ . "/../../vista/TP/tp3/archivos/$nombre");
                    $mensaje = "Archivo subido con éxito <a href='/PWD-TRABAJOS/PWD/vista/TP/tp3/archivos/$nombre' target='_blank'>Ver archivo</a>";

                }
            }
        }
        return $mensaje;
    }
}
?>