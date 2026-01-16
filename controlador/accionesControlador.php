<?php

class AccionesControlador
{
    public function vistaPrincipal()
    {
        include "vista/paginaPrincipal.php";
    }

    public function acciones()
    {
        $accion = isset($_GET["accion"]) ? $_GET["accion"] : "index";

        $admin_vistas = [
            "registrarUsuario",
            "listarUsuario",
            "editarUsuario",
            "registrarAlimento",
            "listarAlimento",
            "editarAlimentos"
        ];

        $public_vistas = [
            "paginaPrincipal",
            "elegirAlimento",
            "loginUsuario",
            "registrarse",
            "logoutUsuario"
        ];

        if (in_array($accion, $admin_vistas)) {
            // Verificamos si es administrador
            if (!isset($_SESSION["Administrador"]) || !$_SESSION["Administrador"]) {
                header("location: index.php?accion=loginUsuario");
                exit();
            }
            include "vista/adminLayoutHeader.php";
            include "vista/" . $accion . ".php";
            include "vista/adminLayoutFooter.php";
        } else if (in_array($accion, $public_vistas)) {
            include "vista/" . $accion . ".php";
        } else {
            include "vista/paginaPrincipal.php";
        }
    }
}

?>