<?php

class controlTP3EJ3 {
    
    public function moveImage(){
        $ruta = null;
        $mensaje = "El formato de archivo tiene que ser una imagen";
        if (isset($_FILES['formFile']) && $_FILES['formFile']['error'] == 0){
            $img = $_FILES['formFile']['tmp_name'];
            $nombre = basename($_FILES['formFile']['name']);
            $destino = __DIR__ . "/../../vista/TP/3/archivos/$nombre";
            $extension = strtolower(pathinfo($nombre, PATHINFO_EXTENSION)); // todo en minúscula

            // extensiones permitidas
            $permitidas = ['jpg','jpeg','png','gif','webp'];

            if(in_array($extension, $permitidas)){
                if(move_uploaded_file($img, $destino)){
                    $ruta = "/PWD/vista/TP/3/archivos/$nombre";
                    $mensaje = "<img src='$ruta' alt='imagen de pelicula' width='200px' height='auto'>";
                } else {
                    $mensaje = "No se pudo mover el archivo";
                }
            }
        }
        return $mensaje;
    }
}

?>