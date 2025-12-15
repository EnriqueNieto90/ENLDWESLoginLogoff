<?php
    /**
    * @author: Enrique Nieto Lorenzo
    * @since: 15/12/2025
    * index del Proyecto Login logoff.
    */
    //Incluyo la configuración de la app y BD
    require_once 'config/confAPP.php';
    require_once 'config/confDBPDO.php';
    
    //Recuperamos la sesión
    session_start();
    
    //Comprobamos si hay una página activa
    if(!isset($_SESSION['paginaEnCurso'])){
        //Asignamos como página en activo el fichero inicioPublico
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }
    
    //Carga la página en curso
    require_once $controller[$_SESSION['paginaEnCurso']];
 
?>