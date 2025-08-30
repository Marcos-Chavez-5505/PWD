<?php
// include_once encabezado
include_once __DIR__ . "../../../../../control/3/controlEJ2.php";

$control = new controlEJ2();
$mensaje = $control->verifyFile();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Resultado del archivo</h3>

                    <!-- Mostrar mensaje con textarea dentro de un contenedor -->
                    <div class="mb-3">
                        <?= $mensaje ?>
                    </div>

                    <div class="text-center mt-3">
                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i> Volver
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
// include_once pie
?>
