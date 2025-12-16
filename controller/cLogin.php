<?php
    /**
    * @author: Enrique Nieto Lorenzo
    * @since: 16/12/2025
    * Login del controlador del Proyecto Login logoff.
    * 
    */
    if(!isset($_REQUEST['login'])){
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: indexLoginLogoff.php');
        exit();
    }
    
    //Carga la página en curso
    require_once $view['layout'];
?>
