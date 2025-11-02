<?php
header("Content-Type: application/json");   // necesario para devolver datos en formato JSON

// Carpeta base donde están los TPs
$baseDir = __DIR__ . "/../../vista/TP";

$tps = [];

// Escanear TPs
foreach (scandir($baseDir) as $tpFolder) {
    if ($tpFolder === '.' || $tpFolder === '..') continue;

    $tpPath = $baseDir . "/" . $tpFolder;
    if (is_dir($tpPath)) {
        $tpData = [];

        // Escanear ejercicios dentro del TP
        foreach (scandir($tpPath) as $ejFolder) {
            if ($ejFolder === '.' || $ejFolder === '..' || $ejFolder === "action") continue;

            $ejPath = $tpPath . "/" . $ejFolder;
            if (is_dir($ejPath)) {
                $ejData = [];

                // Escanear archivos dentro del ejercicio
                foreach (scandir($ejPath) as $file) {
                    if ($file === '.' || $file === '..') continue;
                    $filePath = $ejFolder . "/" . $file; 
                    $ejData[] = $file;  // solo nombre del archivo
                }

                $tpData[$ejFolder] = $ejData;
            }
        }

        $tps[$tpFolder] = $tpData;
    }
}

echo json_encode($tps);
