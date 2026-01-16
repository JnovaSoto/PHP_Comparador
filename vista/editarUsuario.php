<form method="post" id="formularioRegistroE">
    <h1>Actualiza un usuario</h1>
    <?php
    $editar = new UsuarioControlador();
    $editar->editarUsuarioControlador();

    $actualizar = new UsuarioControlador();
    $actualizar->actualizarUsuarioControlador();
    ?>
</form>