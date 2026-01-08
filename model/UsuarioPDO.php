<?php
/**
 * @author: Enrique Nieto Lorenzo
 * @since: 15/12/2025
 * @description: Clase UsuarioPDO que gestiona las operaciones de usuario en la base de datos.
 */

require_once __DIR__ . '/DBPDO.php'; 
require_once __DIR__ . '/Usuario.php';

class UsuarioPDO {

    /**
     * Valida si un usuario existe y la contraseña es correcta.
     * Si es válido, actualiza la información de conexión y devuelve un objeto Usuario.
     * * @param string $codUsuario Código del usuario.
     * @param string $password Contraseña del usuario.
     * @return Usuario|null Devuelve el objeto Usuario si las credenciales son correctas, null en caso contrario.
     */
    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null;

        // Sentencia SQL para buscar el usuario con la contraseña hasheada
        $sentenciaSQL = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario = :codUsuario AND T01_Password = SHA2(:password, 256)";
        
        $parametros = [
            ':codUsuario' => $codUsuario,
            ':password' => $codUsuario . $password
        ];

        $resultado = DBPDO::ejecutarConsulta($sentenciaSQL, $parametros);

        if ($resultado && $resultado->rowCount() > 0) {
            $oUsuarioDatos = $resultado->fetchObject();

            // Guardamos la fecha de la última conexión antes de actualizarla
            $fechaAnterior = $oUsuarioDatos->T01_FechaHoraUltimaConexion; 

            // Actualizamos la fecha de última conexión y el número de conexiones
            $sentenciaUpdate = "UPDATE T01_Usuario SET T01_NumConexiones = T01_NumConexiones + 1, T01_FechaHoraUltimaConexion = NOW() WHERE T01_CodUsuario = :codUsuario";
            DBPDO::ejecutarConsulta($sentenciaUpdate, [':codUsuario' => $codUsuario]);

            // Creamos el objeto Usuario con los datos recuperados y actualizados
            $oUsuario = new Usuario(
                $oUsuarioDatos->T01_CodUsuario,
                $oUsuarioDatos->T01_Password,
                $oUsuarioDatos->T01_DescUsuario,
                $oUsuarioDatos->T01_NumConexiones + 1, // Incrementamos el contador localmente para el objeto actual
                date('Y-m-d H:i:s'), // Nueva fecha de última conexión
                $fechaAnterior, // Fecha de la conexión anterior
                $oUsuarioDatos->T01_Perfil,
                $oUsuarioDatos->T01_ImagenUsuario ?? null
            );
        }

        return $oUsuario;
    }
}
?>

