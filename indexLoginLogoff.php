<?php
    /**
    * @author: Enrique Nieto Lorenzo
    * @since: 15/12/2025
    * index del Proyecto Login logoff.
    */
    //Incluyo la configuración de la app y BD
    require_once 'config/confAPP.php';
    //require_once 'config/confDBPDO.php';
    
    //Recuperamos la sesión
    session_start();
    
    //Si no está la página en curso en la sesión le asignamos el fichero de inicio público
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }
    
    //Si está la sesión iniciada vamos al fichero login
    if (isset($_REQUEST['iniciarSesion'])) {
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'login';
    }
    
    
    
    //Cargamos el controlador de la página en curso
    require_once $controller[$_SESSION['paginaEnCurso']];
 
?>