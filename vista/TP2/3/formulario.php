<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h3 class="text-center mb-4">Member Login</h3>
        <form id="loginForm" action="verificaPass.php" method="POST" data-parsley-validate>
            
            <!-- Usuario -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" id="username" name="usuario" placeholder="Username"
                    required 
                    data-parsley-required-message="El nombre de usuario es obligatorio"
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="El usuario debe tener al menos 4 caracteres">
                    <ul class="parsley-errors-list"></ul>
            </div>

            <!-- Contraseña -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" id="password" name="clave" placeholder="Password"
                    required 
                    data-parsley-required-message="La contraseña es obligatoria"
                    data-parsley-minlength="8"
                    data-parsley-minlength-message="La contraseña debe tener al menos 8 caracteres"
                    data-parsley-pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$"
                    data-parsley-pattern-message="La contraseña debe contener letras y números"
                    data-parsley-not-equalto="#username"
                    data-parsley-not-equalto-message="La contraseña no puede ser igual al nombre de usuario">
                <ul class="parsley-errors-list"></ul>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

</body>
</html>
