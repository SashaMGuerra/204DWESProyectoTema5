<!DOCTYPE html>
<?php
/**
 * @author Isabel Martínez Guerra
 * @since 26/11/2021
 * 
 * Control de acceso con identificación de usuario basado en header().
 * Comprueba si la combinación usuario-contraseña introducidos existen en la base
 * de datos, y si no es así, lo pide de nuevo.
 */
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
} else {
    // Constantes de conexión a la base de datos.
    require_once '../config/configDB.php';
    // Constantes para el parámetro "obligatorio".
    require_once '../config/configApp.php';

    try {
        // Conexión con la base de datos.
        $oDB = new PDO(HOST, USER, PASSWORD);
        $oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query de selección.
        $sSelect = "SELECT T01_CodUsuario, T01_Password FROM T01_Usuario WHERE T01_CodUsuario='{$_SERVER['PHP_AUTH_USER']}'";

        // Preparación y ejecución de la consulta.
        $oResultadoSelect = $oDB->prepare($sSelect);
        $oResultadoSelect->execute();

        /*
         * Si el select no devuelve ningún resultado, es decir, el usuario no
         * existe, o si su contraseña no coincide con la introducida, vuelve
         * a enviar la cabecera.
         * 
         * Dado que la contraseña está cifrada en la base de datos, se utiliza
         * el comando hash para codificar la introducida y comprobar si son
         * la misma.
         */
        $oResultado = $oResultadoSelect->fetchObject();
        if (!$oResultado || $oResultado->T01_Password != hash('sha256', ($_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW']))) {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no reconocido!";
            exit;
        }

        /**
         * Si usuario y contraseña son correctos, añade la conexión al registro
         * de conexiones, y añade la última hora de conexión.
         */
        $oDateTime = new DateTime();
        
        // Query de actualización.
        $sUpdate = <<<QUERY
                UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
                T01_FechaHoraUltimaConexion = '{$oDateTime->format(DATE_W3C)}'
                WHERE T01_CodUsuario='{$_SERVER['PHP_AUTH_USER']}'
        QUERY;

        // Preparación y ejecución de la actualización.
        $oResultadoUpdate = $oDB->prepare($sUpdate);
        $oResultadoUpdate->execute();
        
    } catch (PDOException $exception) {
        /*
         * Mostrado del código de error y su mensaje.
         */
        echo '<div>Se han encontrado errores:</div><ul>';
        echo '<li>' . $exception->getCode() . ' : ' . $exception->getMessage() . '</li>';
        echo '</ul>';
    } finally {
        unset($oDB);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - DWES 5-1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <?php include_once './elementoBtVolver.php'; // Botón de regreso?>
            <h1>Control de acceso con identificación de usuario: header()</h1>
        </header>
        <main>
            <?php
            echo "<div>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</div>";
            echo "<div>Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "</div>";
            ?>
        </main>
        <?php include_once './elementoFooter.php'; //Footer ?>
    </body>
</html>