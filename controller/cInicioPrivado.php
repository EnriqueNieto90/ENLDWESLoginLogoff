<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Controlador de Inicio Privado.
 */

//Si no hay usuario logueado, mandar al login
if (!isset($_SESSION['usuarioDAW205AppLoginLogoffTema5'])) {
    $_SESSION['paginaEnCurso'] = 'login';
    header('Location: indexLoginLogoff.php');
    exit;
}

//BOTÓN CERRAR SESIÓN
if (isset($_REQUEST['cerrarSesion'])) {
    session_destroy(); // Destruir la sesión
    session_start(); // Iniciar una nueva limpia para redirigir
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexLoginLogoff.php');
    exit;
}

//BOTÓN DETALLE
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaEnCurso'] = 'detalle';
    header('Location: indexLoginLogoff.php');
    exit;
}

//CARGAR VISTA
require_once $view['layout'];
?>