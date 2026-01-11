<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Archivo de configuración de rutas.
 */

require_once 'core/231018libreriaValidacion.php';

// Array de controladores
$controller = [
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login'         => 'controller/cLogin.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'detalle'       => 'controller/cDetalle.php'       
];

// Array de vistas
$view = [
    'layout'        => 'view/layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'login'         => 'view/vLogin.php',
    'inicioPrivado' => 'view/vInicioPrivado.php',
    'detalle'       => 'view/vDetalle.php'
];
?>
