<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Vista de Detalle.
 */
?>
<header class="header-app">
    <div class="logo-seccion">
        <span class="titulo-tema">Detalles</span>
        <span class="subtitulo-tema">LOGIN LOGOFF</span>
    </div>
    <div class="nav-derecha">
        <form action="indexLoginLogoff.php" method="post">
            <button name="cerrarSesion" class="btn-header">Cerrar sesión</button>
        </form>
    </div>
</header>

<main>
    <div style="width: 100%; max-width: 900px; margin-bottom: 20px;">
        <form action="indexLoginLogoff.php" method="post">
            <button name="volver" class="btn-link" style="color: #666;">
                <i class="fa-solid fa-arrow-left"></i> Volver a Inicio
            </button>
        </form>
    </div>

    <div class="card-central card-dashboard" style="max-width: 1000px;">
        
        <h3 style="color:var(--ms-blue); margin-bottom:15px;">Variables de Sesión</h3>
        <table class="tabla-microsoft">
            <tr><th>Clave</th><th>Valor</th></tr>
            <?php
            if (!empty($_SESSION)) {
                foreach ($_SESSION as $variable => $resultado) {
                    echo "<tr><td>".$variable."</td><td><pre>" . print_r($resultado, true) . "</pre></td></tr>";
                }
            } else { echo "<tr><td colspan='2'>Vacía</td></tr>"; }
            ?>
        </table>

        <h3 style="color:var(--ms-blue); margin: 30px 0 15px;">Cookies</h3>
        <table class="tabla-microsoft">
            <tr><th>Clave</th><th>Valor</th></tr>
            <?php
            if (!empty($_COOKIE)) {
                foreach ($_COOKIE as $variable => $resultado) {
                    echo "<tr><td>".$variable."</td><td><pre>" . $resultado . "</pre></td></tr>";
                }
            } else { echo "<tr><td colspan='2'>Vacía</td></tr>"; }
            ?>
        </table>

        <h3 style="color:var(--ms-blue); margin: 30px 0 15px;">Server</h3>
        <div style="height: 300px; overflow-y: scroll; border:1px solid #eee;">
            <table class="tabla-microsoft">
                <tr><th>Clave</th><th>Valor</th></tr>
                <?php
                foreach ($_SERVER as $variable => $resultado) {
                    echo "<tr><td>".$variable."</td><td><pre>" . print_r($resultado, true) . "</pre></td></tr>";
                }
                ?>
            </table>
        </div>
        
        <h3 style="color:var(--ms-blue); margin: 30px 0 15px;">PHP Info</h3>
        <div style="overflow-x: auto; padding: 10px; border: 1px solid #ddd;">
            <?php phpinfo(); ?>
        </div>

    </div>
</main>

