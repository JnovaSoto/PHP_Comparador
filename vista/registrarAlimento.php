<?php
$registrar = new AlimentosControlador();
$registrar->registrarAlimentoControlador();
?>
<div class="animate-fade">
    <div class="glass-card mb-5">
        <h1 class="gradient-text mb-4">Registrar Alimento</h1>
        <p class="text-muted mb-4">Ingresa los valores nutricionales por cada 100g de producto.</p>

        <form method="post" id="formularioRegistroA" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputNombre">Nombre del Alimento</label>
                <input type="text" id="inputNombre" name="nombre" class="input-field" placeholder="Ej: Salmón Fresco"
                    required>
            </div>

            <div class="selection-grid">
                <div class="form-group">
                    <label for="inputHidratos">Hidratos Totales (g)</label>
                    <input type="number" id="inputHidratos" name="hidratos" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
                <div class="form-group">
                    <label for="inputAzúcares">Azúcares (g)</label>
                    <input type="number" id="inputAzúcares" name="azucares" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
            </div>

            <div class="selection-grid">
                <div class="form-group">
                    <label for="inputGrasasT">Grasas totales (g)</label>
                    <input type="number" id="inputGrasasT" name="grasasT" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
                <div class="form-group">
                    <label for="inputGrasasS">Grasas Saturadas (g)</label>
                    <input type="number" id="inputGrasasS" name="grasasS" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
            </div>

            <div class="selection-grid">
                <div class="form-group">
                    <label for="inputProteinas">Proteínas (g)</label>
                    <input type="number" id="inputProteinas" name="proteinas" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
                <div class="form-group">
                    <label for="inputVEnergetico">Valor Energético (kcal)</label>
                    <input type="number" id="inputVEnergetico" name="energetico" class="input-field" placeholder="0.00"
                        required step="0.01">
                </div>
            </div>

            <div class="selection-grid">
                <div class="form-group">
                    <label for="tipoAlimento1">Tipo de Alimento</label>
                    <select name="tipoAlimento" id="tipoAlimento1" class="input-field">
                        <option value="0" selected>Selecciona una categoría</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputFile">Imagen del Producto</label>
                    <input type="file" id="inputFile" name="urlFoto" class="input-field">
                </div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" id="botonRegistrar" class="btn-primary w-100">
                    <i class="fas fa-save"></i> Registrar Alimento
                </button>
            </div>
        </form>
    </div>
</div>