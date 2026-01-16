<div class="animate-fade">
    <div class="glass-card mb-5">
        <h1 class="gradient-text mb-4">Registrar Nuevo Usuario</h1>
        <p class="text-muted mb-4">Crea una nueva cuenta de usuario o administrador.</p>

        <form method="post" id="formularioRegistro">
            <div class="form-group">
                <label for="inputCorreo">Correo electrónico</label>
                <input type="email" name="email" id="inputCorreo" class="input-field" placeholder="ejemplo@email.com"
                    required>
            </div>

            <div class="form-group">
                <label for="inputNombre">Nombre completo</label>
                <input type="text" name="nombre" id="inputNombre" class="input-field" placeholder="Nombre completo"
                    maxlength="50" required>
            </div>

            <div class="selection-grid">
                <div class="form-group">
                    <label for="inputContra1">Contraseña</label>
                    <input type="password" name="contra1" id="inputContra1" class="input-field" placeholder="••••••••"
                        maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="inputContra2">Repetir Contraseña</label>
                    <input type="password" name="contra2" id="inputContra2" class="input-field" placeholder="••••••••"
                        maxlength="20" required>
                </div>
            </div>

            <div class="alert-error mb-4" id="errorContra" style="display:none;">
                <i class="fas fa-exclamation-circle"></i> ¡Las contraseñas no coinciden!
            </div>

            <div class="mt-4 text-center">
                <button type="submit" id="botonRegistrar" class="btn-primary w-100">
                    <i class="fas fa-user-plus"></i> Registrar Usuario
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$registrar = new UsuarioControlador();
$registrar->registrarUsuarioControlador();
?>