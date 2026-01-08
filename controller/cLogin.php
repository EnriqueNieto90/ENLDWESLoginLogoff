<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Controlador del Login. Gestiona la autenticación.
 */

//SI SE PULSA CANCELAR Volver a Inicio Público
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: indexLoginLogoff.php');
    exit;
}

//PROCESO DE LOGIN
$entradaOK = true;
$aErrores = ['usuario' => null, 'contrasena' => null];

if (isset($_REQUEST['entrar'])) {
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 50, 1, 1);
    $aErrores['contrasena'] = validacionFormularios::validarPassword($_REQUEST['contrasena'], 20, 4, 1, 1);

    // Comprobar si hay errores
    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST['contrasena'] = ''; // Limpiar contraseña por seguridad
        }
    }
} else {
    $entradaOK = false; 
}

//SI LOS DATOS SON VÁLIDOS CONSULTAR BBDD
if ($entradaOK) {
    require_once 'model/UsuarioPDO.php';
    
    // El modelo valida y devuelve el objeto Usuario si es correcto
    $oUsuarioValido = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contrasena']);

    if ($oUsuarioValido) {
        // LOGIN CORRECTO: Guardamos usuario en sesión y redirigimos
        $_SESSION['usuarioDAW205AppLoginLogoffTema5'] = $oUsuarioValido;
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        
        header('Location: indexLoginLogoff.php');
        exit;
    } else {
        // LOGIN INCORRECTO
        $aErrores['usuario'] = "Usuario o contraseña incorrectos";
    }
}

//CARGAR LA VISTA
require_once $view['layout'];
?>
