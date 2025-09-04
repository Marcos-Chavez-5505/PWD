<?php

class controlEJ3 {
    public function moveImage(){
        $ruta = null;

        if (isset($_FILES['formFile']) && $_FILES['formFile']['error'] == 0){
            $img = $_FILES['formFile']['tmp_name'];
            $nombre = basename($_FILES['formFile']['name']); //basename solo devuelve el nombre del archivo
            $destino = __DIR__ . "/../../vista/TP/3/archivos/$nombre";
            $extension = PATHINFO($_FILES['formFile']['name'], PATHINFO_EXTENSION);
            if ($extension != "txt" && $extension != "doc" && $extension != "pdf" && $extension != "docx"){
                if(move_uploaded_file($img, $destino)){
                    $ruta = "../archivos/$nombre"; 
                }
            }
            
        }

        return $ruta;
    }
}

?>