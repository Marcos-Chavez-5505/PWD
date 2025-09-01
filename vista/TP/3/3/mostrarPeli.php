<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert.alert-success{
            margin: 40px 0;
        }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .contenido {
        flex: 1; /* empuja el footer hacia abajo */
        }

        footer {
        background: #333;
        color: white;
        text-align: center;
        padding: 1rem;
        }
    </style>
</head>

<?php
include_once __DIR__ . '../../../../../control/3/controlEJ3.php';
include_once '../../../estructura/header.php';
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
                    if ($_FILES){
                        echo "<img src='$ruta' alt='imagen de pelicula' width='200px'height='auto'>";
                    }

                ?>
            </p>
        </div>
    </main>
</body>
<?php
include_once '../../../estructura/footer.php';
?>