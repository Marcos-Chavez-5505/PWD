<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/tp2.css">

</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h3 class="text-center mb-4">Member Login</h3>
        <form id="loginForm" action="verificaPass.php" method="POST" novalidate>
            <!-- Usuario -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" id="username" name="usuario" placeholder="Username" required>
                <div class="invalid-feedback">El nombre de usuario es obligatorio y debe tener al menos 4 caracteres.</div>
            </div>

            <!-- Contraseña -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" id="password" name="clave" placeholder="Password" required>
                <div class="invalid-feedback">La contraseña es obligatoria, debe tener al menos 8 caracteres y contener letras y números.</div>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../js/validator.js"></script>

</body>
</html>
