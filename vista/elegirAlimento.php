<?php
if (!isset($_SESSION["Administrador"]) && !isset($_SESSION["Cliente"])) {
    header("location: index.php?accion=registrarse");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar Alimentos - NutriCompare</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <script src="assets/js/scriptsElegirAlimento.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="dashboard-page">
    <?php include("header.php"); ?>

    <main class="container py-5">
        <div class="page-title text-center mb-5">
            <h1 class="gradient-text">Comparador de Alimentos</h1>
            <p class="text-muted">Selecciona las categorías y alimentos para ver su desglose nutricional.</p>
        </div>

        <!-- Selection Controls -->
        <div class="selection-dashboard glass-card mb-5 p-4">
            <div class="selection-grid">
                <div class="form-group">
                    <label for="elegirTipo1">Categoría del Alimento 1</label>
                    <select name="elegirTipo1" id="elegirTipo1" class="input-field">
                        <option value="0" selected>Elige una categoría</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="elegirTipo2">Categoría del Alimento 2</label>
                    <select name="elegirTipo2" id="elegirTipo2" class="input-field">
                        <option value="0" selected>Elige una categoría</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Comparison Cards -->
        <form method="post" action="#" id="formAlimentos">
            <div class="comparison-grid mb-5">
                <!-- Food Item 1 -->
                <div class="food-card-wrapper">
                    <div class="form-group mb-3">
                        <label for="elegirAlimento1">Seleccionar Alimento 1</label>
                        <select name="elegirAlimento1" id="elegirAlimento1" class="input-field">
                            <option>Elige alimento</option>
                        </select>
                    </div>
                    <div class="alimento1 glass-card p-4 animate-fade">
                        <div class="food-img-container mb-3">
                            <img src="" id="imagenComida1" alt="" class="img-fluid rounded">
                        </div>
                        <h2 id="tituloComida1" class="food-title mb-4"></h2>
                        <div class="nutrition-grid">
                            <div class="stat-item"><span>Hidratos</span><strong id="hidratosTot1">...</strong></div>
                            <div class="stat-item"><span>Azúcares</span><strong id="azucares1">...</strong></div>
                            <div class="stat-item"><span>Grasas</span><strong id="grasasTot1">...</strong></div>
                            <div class="stat-item"><span>Saturadas</span><strong id="grasasSat1">...</strong></div>
                            <div class="stat-item"><span>Proteínas</span><strong id="proteinas1">...</strong></div>
                            <div class="stat-item highlight"><span>Calorías</span><strong id="vEnergetico1">...</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Food Item 2 -->
                <div class="food-card-wrapper">
                    <div class="form-group mb-3">
                        <label for="elegirAlimento2">Seleccionar Alimento 2</label>
                        <select name="elegirAlimento2" id="elegirAlimento2" class="input-field">
                            <option>Elige alimento</option>
                        </select>
                    </div>
                    <div class="alimento2 glass-card p-4 animate-fade">
                        <div class="food-img-container mb-3">
                            <img src="" id="imagenComida2" alt="" class="img-fluid rounded">
                        </div>
                        <h2 id="tituloComida2" class="food-title mb-4"></h2>
                        <div class="nutrition-grid">
                            <div class="stat-item"><span>Hidratos</span><strong id="hidratosTot2">...</strong></div>
                            <div class="stat-item"><span>Azúcares</span><strong id="azucares2">...</strong></div>
                            <div class="stat-item"><span>Grasas</span><strong id="grasasTot2">...</strong></div>
                            <div class="stat-item"><span>Saturadas</span><strong id="grasasSat2">...</strong></div>
                            <div class="stat-item"><span>Proteínas</span><strong id="proteinas2">...</strong></div>
                            <div class="stat-item highlight"><span>Calorías</span><strong id="vEnergetico2">...</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-5">
                <button type="submit" id="botonComparar" class="btn-primary btn-lg px-5">
                    <i class="fas fa-balance-scale"></i> GENERAR COMPARATIVA
                </button>
            </div>
        </form>

        <!-- Dynamic Statistics -->
        <div class="Estadisticas animate-fade">
            <div class="section-title mb-4">
                <i class="fas fa-chart-line"></i> Análisis por Componente
            </div>
            <div class="charts-grid mb-5">
                <div class="chart-box glass-card p-3">
                    <h3>Hidratos</h3>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="chart-box glass-card p-3">
                    <h3>Azúcares</h3>
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="chart-box glass-card p-3">
                    <h3>Grasas</h3>
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="chart-box glass-card p-3">
                    <h3>Saturadas</h3>
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="chart-box glass-card p-3">
                    <h3>Proteínas</h3>
                    <canvas id="myChart4"></canvas>
                </div>
                <div class="chart-box glass-card p-3">
                    <h3>Valor Energético</h3>
                    <canvas id="myChart5"></canvas>
                </div>
            </div>

            <div class="section-title mb-4">
                <i class="fas fa-percentage"></i> Composición Relativa
            </div>
            <div class="pie-charts-grid">
                <div class="chart-box glass-card p-4 text-center">
                    <h3>Primer Alimento</h3>
                    <canvas id="myChart6" class="mx-auto"></canvas>
                </div>
                <div class="chart-box glass-card p-4 text-center">
                    <h3>Segundo Alimento</h3>
                    <canvas id="myChart7" class="mx-auto"></canvas>
                </div>
            </div>
        </div>
    </main>

    <?php include("footer.php"); ?>


</body>

</html>