<header class="main-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php?accion=paginaPrincipal">
                <span class="logo-accent">Nutri</span>Compare
            </a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php?accion=paginaPrincipal" class="nav-link">Inicio</a></li>
                <li><a href="index.php?accion=elegirAlimento" class="nav-link">Comparar</a></li>
                <?php if (isset($_SESSION["Administrador"])): ?>
                    <li><a href="index.php?accion=listarUsuario" class="nav-link admin-link">Admin Panel</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="header-actions">
            <?php if (isset($_SESSION["Cliente"]) || isset($_SESSION["Administrador"])): ?>
                <div class="user-info">
                    <span class="user-name">Hola, <?php echo $_SESSION["nombre"] ?? 'Usuario'; ?></span>
                    <a href="index.php?accion=logoutUsuario" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Salir</span>
                    </a>
                </div>
            <?php else: ?>
                <a href="index.php?accion=loginUsuario" class="btn-login">
                    <i class="fas fa-user"></i>
                    <span>Iniciar Sesión</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>