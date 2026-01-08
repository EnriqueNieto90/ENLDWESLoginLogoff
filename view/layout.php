<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @description: Layout principal. Estructura común de toda la aplicación.
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación LoginLogoff | Enrique Nieto</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="webroot/css/estilosLogin.css">
</head>
<body>

    <?php require_once $view[$_SESSION['paginaEnCurso']]; ?>

    <footer class="footer-microsoft">
        <div class="footer-content">
            <p class="copy-text">2025-26 IES LOS SAUCES. © Todos los derechos reservados.</p>
            <p>Enrique Nieto Lorenzo</p>
            <div class="footer-links">
                <a href="https://github.com/EnriqueNieto90/ENLDWESLoginLogoff" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="../index.html"><i class="fa-solid fa-house"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>