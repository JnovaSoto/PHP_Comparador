<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - NutriCompare</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="assets/js/scriptsCrudUsuario.js"></script>
</head>

<body class="admin-page">
    <div class="admin-layout">
        <aside class="admin-sidebar glass-card">
            <div class="admin-brand text-center mb-5">
                <div class="logo">
                    <span class="logo-accent">Admin</span>
                </div>
            </div>
            <nav class="admin-nav">
                <ul>
                    <li><a href="index.php?accion=listarUsuario"
                            class="<?php echo $_GET['accion'] == 'listarUsuario' ? 'active' : ''; ?>"><i
                                class="fas fa-users"></i> Usuarios</a></li>
                    <li><a href="index.php?accion=registrarUsuario"
                            class="<?php echo $_GET['accion'] == 'registrarUsuario' ? 'active' : ''; ?>"><i
                                class="fas fa-user-plus"></i> Nuevo Usuario</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="index.php?accion=listarAlimento"
                            class="<?php echo $_GET['accion'] == 'listarAlimento' ? 'active' : ''; ?>"><i
                                class="fas fa-hamburger"></i> Alimentos</a></li>
                    <li><a href="index.php?accion=registrarAlimento"
                            class="<?php echo $_GET['accion'] == 'registrarAlimento' ? 'active' : ''; ?>"><i
                                class="fas fa-plus-circle"></i> Nuevo Alimento</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="index.php?accion=paginaPrincipal" class="nav-exit"><i
                                class="fas fa-external-link-alt"></i> Ver Web</a></li>
                    <li><a href="index.php?accion=logoutUsuario" class="nav-logout"><i class="fas fa-sign-out-alt"></i>
                            Cerrar Sesión</a></li>
                </ul>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar glass-card mb-4 px-4 py-3">
                <div class="topbar-content">
                    <h2 class="admin-title">
                        <?php
                        $titles = [
                            'listarUsuario' => 'Gestión de Usuarios',
                            'registrarUsuario' => 'Registrar Nuevo Usuario',
                            'editarUsuario' => 'Editar Usuario',
                            'listarAlimento' => 'Gestión de Alimentos',
                            'registrarAlimento' => 'Añadir Nuevo Alimento',
                            'editarAlimentos' => 'Editar Alimento'
                        ];
                        echo $titles[$_GET['accion']] ?? 'Panel de Control';
                        ?>
                    </h2>
                    <div class="admin-user">
                        <span>Administrador</span>
                        <div class="admin-avatar"><i class="fas fa-user-shield"></i></div>
                    </div>
                </div>
            </header>
            <div class="admin-content-card glass-card p-4">