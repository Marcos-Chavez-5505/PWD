<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/vista/estructura/header.php";
?>
<body>
    
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Resultado del archivo</h3>

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
    </main>
</body>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/PWD/vista/estructura/footer.php";
?>
