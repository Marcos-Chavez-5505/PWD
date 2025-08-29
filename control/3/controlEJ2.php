<?php

class controlEJ2{
    public function verifyFile(){
        $mensaje = "no se ha seleccionado ningun archivo";
        if($_FILES['archivoTXT']['error'] === 0){
            $nombreArchivo = $_FILES['archivoTXT']['name'];
            $extension = PATHINFO($nombreArchivo, PATHINFO_EXTENSION);
            if ($extension !== 'txt') {
                $mensaje = "El archivo no es un .txt";
            }else{
                $txt = file_get_contents($_FILES['archivoTXT']['tmp_name']);
                $mensaje = "<textarea cols='30' rows='10'>$txt</textarea>";
            }
        }

        return $mensaje;
    }
}
?>