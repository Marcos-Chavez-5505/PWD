<?php

class controlEJ3 {
    public function moveImage(){
        $ruta = null;

        if (isset($_FILES['formFile']) && $_FILES['formFile']['error'] == 0){
            $img = $_FILES['formFile']['tmp_name'];
            $nombre = basename($_FILES['formFile']['name']); //basename solo devuelve el nombre del archivo
            $destino = __DIR__ . "/../../vista/TP/tp3/archivos/$nombre";

            if(move_uploaded_file($img, $destino)){
                $ruta = "../archivos/$nombre"; 
            }
        }

        return $ruta;
    }
}

?>