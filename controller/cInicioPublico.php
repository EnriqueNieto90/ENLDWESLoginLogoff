<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Controlador de la página de Inicio Público.
 */

//GESTIÓN DE IDIOMA
if (isset($_REQUEST['idioma'])) {
    setcookie("idioma", $_REQUEST['idioma'], time() + 604800);
    header('Location: indexLoginLogoff.php');
    exit;
}

//GESTIÓN DEL BOTÓN "INICIAR SESIÓN"
if (isset($_REQUEST['iniciarSesion'])) {
    $_SESSION['paginaAnterior'] = 'inicioPublico';
    $_SESSION['paginaEnCurso'] = 'login';
    header('Location: indexLoginLogoff.php');
    exit;
}

//CARGAR LA VISTA
require_once $view['layout'];
?>