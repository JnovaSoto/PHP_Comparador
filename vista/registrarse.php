<?php
$registrar = new UsuarioControlador();
$registrar->registrarseComoCliente();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - NutriCompare</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="auth-page">
    <?php include("header.php"); ?>

    <div class="auth-container">
        <div class="auth-card glass-card animate-fade">
            <div class="auth-header text-center">
                <i class="fas fa-user-plus auth-icon"></i>
                <h1>Crea tu cuenta</h1>
                <p>Únete a la comunidad de NutriCompare</p>
            </div>

            <form method="post" id="formularioRegistro" action="" class="auth-form">
                <div class="form-group">
                    <label for="inputCorreo">Correo electrónico</label>
                    <input type="email" name="email" id="inputCorreo" class="input-field"
                        placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group">
                    <label for="inputNombre">Nombre de usuario</label>
                    <input type="text" name="nombre" id="inputNombre" class="input-field" placeholder="Tu nombre"
                        maxlength="20" required>
                </div>

                <div class="selection-grid">
                    <div class="form-group">
                        <label for="inputContra1">Contraseña</label>
                        <input type="password" name="contra1" id="inputContra1" class="input-field"
                            placeholder="••••••••" maxlength="20" required>
                    </div>

                    <div class="form-group">
                        <label for="inputContra2">Confirmar</label>
                        <input type="password" name="contra2" id="inputContra2" class="input-field"
                            placeholder="••••••••" maxlength="20" required>
                    </div>
                </div>

                <div id="errorContra" class="alert-error mb-4" style="display:none;">
                    <i class="fas fa-exclamation-circle"></i> ¡Las contraseñas no coinciden!
                </div>

                <div class="mt-4">
                    <button type="submit" id="botonRegistrar" class="btn-primary w-100">
                        <i class="fas fa-user-plus"></i> Crear mi cuenta
                    </button>
                </div>

                <div class="auth-footer text-center mt-4">
                    <p class="text-muted">¿Ya tienes una cuenta? <a href="index.php?accion=loginUsuario"
                            class="auth-link">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>



    <script src="assets/js/scriptsCrudUsuario.js"></script>
</body>

</html>