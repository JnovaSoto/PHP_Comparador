<?php
if (!isset($_SESSION["Invitado"])) {
    $_SESSION["Invitado"] = true;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriCompare - Compara y Decide</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="home-page">
    <?php include("vista/header.php"); ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container hero-container">
                <div class="hero-content animate-fade">
                    <span class="badge">Nuevo: Base de datos ampliada</span>
                    <h1>Compara tus <span class="gradient-text">comidas</span> de forma inteligente</h1>
                    <p>Descubre el valor nutricional real de lo que comes. Nuestra herramienta te permite comparar dos
                        alimentos con gráficas interactivas y datos precisos.</p>
                    <div class="hero-btns">
                        <a href="index.php?accion=elegirAlimento" class="btn-primary">
                            <i class="fas fa-chart-bar"></i>
                            Empezar a comparar
                        </a>
                        <a href="#features" class="btn-secondary">Saber más</a>
                    </div>
                </div>
                <div class="hero-image-wrapper">
                    <div class="glass-orb"></div>
                    <img src="https://fotografias.larazon.es/clipping/cmsimages02/2022/04/01/BE78C788-5591-428B-A83A-FF2CDAF27C65/98.jpg?crop=4200,2363,x0,y218&width=1900&height=1069&optimize=low&format=webply"
                        alt="Nutrición Saludable" class="hero-img">
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features-section">
            <div class="container">
                <div class="section-header">
                    <h2>¿Por qué NutriCompare?</h2>
                    <p>Transformamos datos complejos en información visual fácil de entender.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card glass-card animate-fade" style="animation-delay: 0.2s">
                        <div class="feature-icon"><i class="fas fa-chart-pie"></i></div>
                        <h3>Gráficas Dinámicas</h3>
                        <p>Visualiza proteínas, grasas e hidratos de forma comparativa e inmediata.</p>
                    </div>
                    <div class="feature-card glass-card animate-fade" style="animation-delay: 0.4s">
                        <div class="feature-icon"><i class="fas fa-database"></i></div>
                        <h3>Datos Precisos</h3>
                        <p>Información detallada extraída de bases de datos nutricionales confiables.</p>
                    </div>
                    <div class="feature-card glass-card animate-fade" style="animation-delay: 0.6s">
                        <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
                        <h3>Multiplataforma</h3>
                        <p>Diseñado para funcionar perfectamente en computadoras y dispositivos móviles.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-card glass-card">
                    <h2>¿Listo para mejorar tu dieta?</h2>
                    <p>Únete a miles de personas que ya están tomando decisiones más informadas sobre su alimentación.
                    </p>
                    <a href="index.php?accion=registrarse" class="btn-primary">Crear cuenta gratuita</a>
                </div>
            </div>
        </section>
    </main>

    <?php include("vista/footer.php"); ?>


</body>

</html>