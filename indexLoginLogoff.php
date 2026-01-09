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
require_once $controller[$_SESSION['paginaEnCurso']];

?>