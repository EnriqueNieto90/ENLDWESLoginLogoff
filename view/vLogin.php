/**
    * @author: Enrique Nieto Lorenzo
    * @since: 16/12/2025
    * Login del controlador del Proyecto Login logoff.
    * 
    */
<h2>INICIO SESIÓN</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> 
            <input type="text" id="usuario" name="usuario" value="<?php echo $_REQUEST['usuario']??'' ?>" placeholder="Usuario">
            <br>
            <input type="password" id="contrasena" name="contrasena" value="<?php echo $_REQUEST['contrasena']??'' ?>" placeholder="Contraseña">
            <br>   
            <div class="form-actions">
                <button name="entrar" id="entrar"><span>Entrar</span></button>
                <button name="cancelar" id="cancelar"><span>Cancelar</span></button>
            </div>
            <hr>
            <p>¿No tienes cuenta?</p>
            <input type="button" value="Registrarse" name="registrarse" id="registrarse">
        </form>

