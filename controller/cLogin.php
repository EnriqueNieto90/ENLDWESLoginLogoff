<?php
    /**
    * @author: Enrique Nieto Lorenzo
    * @since: 16/12/2025
    * Login del controlador del Proyecto Login logoff.
    * 
    */
    // volvemos al index principal al dar a cancelar
    if (isset($_REQUEST['cancelar'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }

    // entramos al inicio privado al dar a entrar
    if (isset($_REQUEST['entrar'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    }
    
    //Carga la página en curso
    require_once $view['layout'];
?>
