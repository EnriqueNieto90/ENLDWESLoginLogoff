<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Vista de Inicio Privado.
 */
?>
<header class="header-app">
    <div class="logo-seccion">
        <span class="titulo-tema">Portal Privado</span>
        <span class="subtitulo-tema">LOGIN LOGOFF</span>
    </div>
    <div class="nav-derecha">
        <form action="indexLoginLogoff.php" method="post">
            <button name="cerrarSesion" class="btn-header">Cerrar sesión</button>
        </form>
    </div>
</header>

<main>
    <div class="card-central card-dashboard">
        
        <div class="welcome-msg">
            <?php
                // Asumimos que el objeto usuario está almacenado en la sesión desde el controlador
                $aUsuarioEnCurso = $_SESSION['usuarioDAW205AppLoginLogoffTema5'];
                
                $fechaUltimaConexionAnterior = new DateTime($aUsuarioEnCurso->getFechaHoraUltimaConexionAnterior());
                $idioma = $_COOKIE["idioma"] ?? "ES";

                if ($idioma == "ES") {
                    setlocale(LC_TIME, 'es_ES.utf8');
                    echo '<h2>Bienvenido <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                    echo '<p>Esta es la <strong>'.$aUsuarioEnCurso->getNumConexiones().'ª</strong> vez que se conecta.</p>';
                } elseif ($idioma == "EN") {
                    echo '<h2>Welcome <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                    echo '<p>This is the <strong>'.$aUsuarioEnCurso->getNumConexiones().'</strong> time you have connected.</p>';
                } else {
                     echo '<h2>Bienvenue <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                     echo '<p>C\'est la <strong>'.$aUsuarioEnCurso->getNumConexiones().'e</strong> fois que vous vous connectez.</p>';
                }
            ?>
        </div>

        <?php if (($aUsuarioEnCurso->getNumConexiones()) > 1) { ?>
            <div class="info-conexion">
                <i class="fa-regular fa-clock"></i> Última conexión: 
                <strong><?php echo $fechaUltimaConexionAnterior->format('d/m/Y H:i:s'); ?></strong>
            </div>
        <?php } ?>
    
        <div class="contenedor-boton-centro">
            <form action="indexLoginLogoff.php" method="post">
                <button name="detalle" class="btn-primary btn-detalle">
                    Ver Detalle <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
        
    </div>
</main>