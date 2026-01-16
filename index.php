<?php
// Iniciamos el búfer de salida y la sesión
ob_start();
session_start();

// Requerimos los controladores y modelos necesarios
require_once "controlador/accionesControlador.php";
require_once "controlador/adminControlador.php";
require_once "controlador/usuarioControlador.php";
require_once "controlador/alimentosControlador.php";
require_once "controlador/comparacionControlador.php";
require_once "controlador/tipoAlimentoControlador.php";

require_once "modelo/accionesModelo.php";
require_once "modelo/adminModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/alimentosModelo.php";
require_once "modelo/comparacionModelo.php";
require_once "modelo/tipoAlimentoModelo.php";
require_once "config/conexionBD.php";

// Creamos un objeto de la clase AccionesControlador
$controlador = new AccionesControlador();

// Si no hay ninguna acción especificada, mostramos la página principal
if (!isset($_GET["accion"])) {
    $controlador->vistaPrincipal();
} else {
    // Si hay una acción, dejamos que el controlador la gestione
    $controlador->acciones();
}
