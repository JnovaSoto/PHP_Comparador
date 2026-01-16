<?php
$registro = new AdminControlador();
$registro->ingresoControladorUsuario();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - NutriCompare</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="auth-page">
    <?php include("header.php"); ?>

    <div class="auth-container">
        <div class="auth-card glass-card animate-fade">
            <div class="auth-header text-center">
                <i class="fas fa-sign-in-alt auth-icon"></i>
                <h1>¡Bienvenido de nuevo!</h1>
                <p>Ingresa tus credenciales para continuar</p>
            </div>

            <form action="" method="post" id="formularioRegistro" class="auth-form">
                <div class="form-group">
                    <label for="inputNombre">Nombre de usuario</label>
                    <input type="text" name="nombre" id="inputNombre" class="input-field"
                        placeholder="Tu nombre de usuario" maxlength="20" required>
                </div>

                <div class="form-group">
                    <label for="inputContra1">Contraseña</label>
                    <input type="password" name="contra1" id="inputContra1" class="input-field" placeholder="••••••••"
                        maxlength="20" required>
                </div>

                <div class="mt-4">
                    <button type="submit" id="botonRegistrar" class="btn-primary w-100">
                        <i class="fas fa-sign-in-alt"></i> Acceder a mi cuenta
                    </button>
                </div>

                <div class="auth-footer text-center mt-4">
                    <p class="text-muted">¿No tienes una cuenta? <a href="index.php?accion=registrarse"
                            class="auth-link">Regístrate gratis</a></p>
                </div>
            </form>
        </div>
    </div>



    <script src="assets/js/scriptsLoginUsuario.js"></script>
</body>

</html>