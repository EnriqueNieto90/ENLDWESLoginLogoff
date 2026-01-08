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
                // We assume the user object is stored in session from the Login Controller
                $aUsuarioEnCurso = $_SESSION['usuarioDAW205AppLoginLogoffTema5'];
                
                // Get previous connection date
                $fechaUltimaConexionAnterior = new DateTime($aUsuarioEnCurso->getFechaHoraUltimaConexionAnterior());
                $idioma = $_COOKIE["idioma"] ?? "ES";

                if ($idioma == "ES") {
                    setlocale(LC_TIME, 'es_ES.utf8');
                    echo '<h2>Bienvenido <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                    echo '<p style="margin-top:10px;">Esta es la <strong>'.$aUsuarioEnCurso->getNumConexiones().'ª</strong> vez que se conecta.</p>';
                } elseif ($idioma == "EN") {
                    echo '<h2>Welcome <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                    echo '<p style="margin-top:10px;">This is the <strong>'.$aUsuarioEnCurso->getNumConexiones().'</strong> time you have connected.</p>';
                } else {
                     echo '<h2>Bienvenue <strong>'.$aUsuarioEnCurso->getDescUsuario().'</strong></h2>';
                     echo '<p style="margin-top:10px;">C\'est la <strong>'.$aUsuarioEnCurso->getNumConexiones().'e</strong> fois que vous vous connectez.</p>';
                }
            ?>
        </div>

        <?php if (($aUsuarioEnCurso->getNumConexiones()) > 1) { ?>
            <div class="info-conexion">
                <i class="fa-regular fa-clock"></i> Última conexión: 
                <strong><?php echo $fechaUltimaConexionAnterior->format('d/m/Y H:i:s'); ?></strong>
            </div>
        <?php } ?>
    
        <div style="text-align: center; margin-top: 40px;">
            <form action="indexLoginLogoff.php" method="post">
                <button name="detalle" class="btn-primary" style="width: auto; padding: 10px 40px;">
                    Ver Detalle <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
        
    </div>
</main>

