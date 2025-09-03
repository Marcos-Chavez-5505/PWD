<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php
include_once __DIR__ . "../../../../../control/1/controlEj7.php";
include_once '../../../estructura/header.php';
$num1 = $_POST['numero1'];
$num2 = $_POST['numero2'];
$operacion = $_POST['operacion'];

$objOpe = new Operaciones();
$resultado = $objOpe->operacion($operacion, $num1, $num2);

// Para mostrar la operación con texto bonito
switch($operacion){
    case "suma":
        $simbolo = "+";
        $nombreOperacion = "Suma";
        break;
    case "resta":
        $simbolo = "-";
        $nombreOperacion = "Resta";
        break;
    case "multiplicacion":
        $simbolo = "×";
        $nombreOperacion = "Multiplicación";
        break;
    default:
        $simbolo = "?";
        $nombreOperacion = "Desconocida";
}
?>
<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-4 rounded shadow-sm" style="max-width: 500px; width: 100%;">
        <h3 class="mb-3 text-center">Resultado de la Operación</h3>

        <p class="lead text-center">
            Operación: <strong><?= $nombreOperacion ?></strong><br>
            <?= htmlspecialchars($num1) ?> <?= $simbolo ?> <?= htmlspecialchars($num2) ?> = <strong><?= htmlspecialchars($resultado) ?></strong>
        </p>

        <div class="d-grid">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Formulario
            </a>
        </div>
    </div>
</main>
<?php
include_once '../../../estructura/footer.php';
?>