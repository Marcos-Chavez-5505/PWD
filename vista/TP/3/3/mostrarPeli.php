<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert.alert-success{
            margin: 40px 0;
        }
        .contenido {
        flex: 1; /* empuja el footer hacia abajo */
        }

        footer {
        padding: 1rem;
        }
    </style>
</head>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



include_once __DIR__ . '../../../../../control/3/controlEJ3.php';
include_once '../../../estructura/header.php';

$controlEJ3 = new controlEJ3;
$ruta = $controlEJ3->moveImage();
?>

<body>
    <main>
        <div class="alert alert-success contenido">
            <h1 class="alert-heading text-primary">La película introducida es</h1>
            <br>
            <p>
                <strong>Título:</strong> <?= htmlspecialchars($_POST['titulo']) ?><br>
                <strong>Actores:</strong> <?= htmlspecialchars($_POST['actores']) ?><br>
                <strong>Director:</strong> <?= htmlspecialchars($_POST['director']) ?><br>
                <strong>Guión:</strong> <?= htmlspecialchars($_POST['guion']) ?><br>
                <strong>Producción:</strong> <?= htmlspecialchars($_POST['produccion']) ?><br>
                <strong>Año:</strong> <?= htmlspecialchars($_POST['anio']) ?><br>
                <strong>Nacionalidad:</strong> <?= htmlspecialchars($_POST['nacionalidad']) ?><br>
                <strong>Género:</strong> <?= htmlspecialchars($_POST['genero'] ?? 'No especificado') ?><br>
                <strong>Duración:</strong> <?= htmlspecialchars($_POST['duracion']) ?><br>
                <strong>Restricciones de edad:</strong> <?= htmlspecialchars($_POST['restriccion']) ?><br>
                <strong>Sinopsis:</strong> <?= nl2br(htmlspecialchars($_POST['sinopsis'])) ?><br>
                <strong>Imagen de la pelicula: </strong>
                <?php
                    if ($_FILES && !is_null($ruta)){
                        echo "<img src='$ruta' alt='imagen de pelicula' width='200px'height='auto'>";
                    }else{
                        echo "El formato de archivo tiene que ser una imagen";
                    }

                ?>
                <div class="text-center">
                    <a href="index.php" class="btn btn-outline-primary"> <--Volver al formulario</a>
                </div>
            </p>
        </div>
    </main>
</body>
<?php
include_once '../../../estructura/footer.php';
?>