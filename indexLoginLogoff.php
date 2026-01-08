<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Index del Proyecto Login Logoff (Front Controller).
 */

// CARGA DE CONFIGURACIONES
require_once 'config/confAPP.php';  
require_once 'config/confDBPDO.php';
require_once 'model/Usuario.php';

// RECUPERAR O INICIAR LA SESIÓN
session_start();


// Si no hay página definida, empezamos por el inicio público
if (!isset($_SESSION['paginaEnCurso'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
}

// CARGAR EL CONTROLADOR CORRESPONDIENTE
// Añadimos una comprobación de seguridad por si la página no existe
if (isset($controller[$_SESSION['paginaEnCurso']])) {
    require_once $controller[$_SESSION['paginaEnCurso']];
} else {
    // Si hay algún error en la sesión, mandamos al inicio por seguridad
    require_once $controller['inicioPublico'];
}
?>