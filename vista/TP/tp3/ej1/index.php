<?php
//include_once encabezado
?>

<head>
    <link rel="stylesheet" href="tp3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Subir archivo</h3>

                    <form action="mostrar.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Seleccione un archivo (.pdf o .doc)</label>
                            <input class="form-control" type="file" id="archivo" name="archivo" accept=".pdf,.doc">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="bi bi-upload me-2"></i> Enviar
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
//include_once footer
?>
