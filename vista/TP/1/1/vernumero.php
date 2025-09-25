<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php 
include_once __DIR__ . '../../../../estructura/header.php';

include_once __DIR__ . "../../../../../control/valorEncapsulado.php";
?>

<main class="container my-5">
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-6">

            <?php if ($tieneDato): ?>
                <div class="card shadow text-center p-4">
                    <h4>Resultado</h4>
                    <p class="fs-5 mt-3">
                        El número que ingresaste es: 
                        <strong><?= htmlspecialchars($numero) ?> (<?= htmlspecialchars($mensaje) ?>)</strong>
                    </p>
                    <a href="/PWD/vista/TP/1/1/Ejercicio1.php" class="btn btn-secondary mt-3">
                        <i class="bi bi-arrow-left"></i> Volver al formulario
                    </a>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    No se recibió ningún número.
                    <div class="mt-3">
                        <a href="/PWD/vista/TP/1/1/Ejercicio1.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Ir al formulario
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php
include_once __DIR__ . '../../../../estructura/footer.php';
?>
