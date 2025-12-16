<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMA 6 - DESARROLLO DE APLICACIONES WEB</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" type="text/css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: green;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
            flex-grow: 1;
        }
        header h2 {
            margin: 0;
            font-size: 1rem;
            font-weight: normal;
            letter-spacing: 1px;
            width: 100%;
            text-align: left;
            margin-top: 10px;
        }
        .header-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .idioma-buttons {
            display: flex;
            gap: 10px;
        }
        .idioma-buttons button {
            padding: 8px 12px;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            background-color: white;
        }
        .idioma-buttons button:hover {
            background-color: #e0e0e0;
        }
        .idioma-buttons button img {
            height: 25px;
            width: auto;
            display: block;
        }
        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            min-height: 400px;
            text-align: center;
            margin-bottom: 200px;
        }
        main img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }
        .boton, 
        input[type="submit"],
        button.login-btn {
            padding: 12px 25px;
            border-radius: 5px;
            background-color: lightgreen;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s;
        }
        .boton:hover,
        input[type="submit"]:hover,
        button.login-btn:hover {
            background-color: #90ee90;
        }
        footer {
            margin: auto;
            background-color: green;
            text-align: center;
            padding: 20px;
            color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        footer i {
            font-size: 2.1rem;
            color: white;
        }
        footer a {
            color: white;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <div style="width: 100%;">
            <h1>Inicio público</h1>
            <h2><b>LOGIN LOGOFF</b></h2>
        </div>
        <div class="header-controls">
            <form action="" method="post" class="idioma-buttons">
                <button type="submit" name="idioma" value="ES" id="ES">
                    <img src="webroot/images/esp.png" alt="Español">
                </button>
                <button type="submit" name="idioma" value="EN" id="EN">
                    <img src="webroot/images/uk.png" alt="English">
                </button>
                <button type="submit" name="idioma" value="FR" id="FR">
                    <img src="webroot/images/francia.png" alt="Français">
                </button>
            </form>
            <form action="" method="post">
                <button name="iniciarSesion" class="login-btn">
                    <span>Iniciar sesión</span>
                </button>
            </form>
        </div>
    </header>
    
    <main>
        <?php require_once $view[$_SESSION['paginaEnCurso']];?>
    </main>
    <footer>
        <div>
            <h4>2025-26 IES LOS SAUCES. © Todos los derechos reservados.</h4>
            <p>
                <a href="https://enriquenielor.ieslossauces.es/">Enrique Nieto Lorenzo</a> 
                Fecha de Actualización: <time datetime="2025-11-20">20-11-2025</time>
            </p>
            <a href="https://github.com/EnriqueNieto90/ENLDWESLoginLogoff.git" target="_blank">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </footer>
</body>
</html>