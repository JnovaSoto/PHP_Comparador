<form method="post" id="formularioRegistro">
    <h1>Actualizar Alimento</h1>

    <?php
    $editar = new alimentosControlador();
    $editar->editarAlimentoControlador();

    $actualizar = new alimentosControlador();
    $actualizar->actualizarAlimentoControlador();
    ?>
</form>