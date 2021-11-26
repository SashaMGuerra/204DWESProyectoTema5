<!DOCTYPE html>
<?php
/**
 * @author Isabel Martínez Guerra
 * @since 26/11/2021
 * 
 * Control de acceso con identificación de usuario basado en header() y uso de
 * la tabla "Usuario".
 */
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
} else {
    //Librería de validación.
    include_once '../core/210322ValidacionFormularios.php';

    // Constantes de conexión a la base de datos.
    require_once '../config/configDB.php';
    // Constantes para el parámetro "obligatorio".
    require_once '../config/configApp.php';

    try {
        // Conexión con la base de datos.
        $oDB = new PDO(HOST, USER, PASSWORD);
        $oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query de selección.
        $sSQL = "SELECT * FROM Usuario WHERE CodUsuario='{$_SERVER['PHP_AUTH_USER']}'";
        
        // Preparación y ejecución de la consulta.
        $oResultadoConsulta = $oDB->prepare($sSQL);
        $oResultadoConsulta->execute();
        
        //var_dump($oResultadoConsulta->fetchObject()->Password);
        
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
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 25/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - DWES 5-1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
<?php include_once './elementoBtVolver.php'; // Botón de regreso, ya formateado     ?>
            <h1>Control de acceso con identificación de usuario: header()</h1>
        </header>
        <main>
<?php
/*
 * Formulario de introducción de usuario y contraseña.
 */

/*
 * Inicialización del array de elementos del formulario.
 */
$aFormulario = [
    'usuario' => '',
    'password' => ''
];

/*
 * Inicialización del array de errores.
 */
$aErrores = [
    'usuario' => '',
    'password' => ''
];

/*
 * Si el formulario ha sido enviado, valida los campos y registra los errores.
 */
if (isset($_REQUEST['submit'])) {
    $bEntradaOK = true;

    // Registro de errores. Valida todos los campos.
    $aErrores['usuario'] = '';
    $aErrores['password'] = '';

    /*
     * Validación por errores. Si existen, pone la entrada correcta
     * a false.
     */
    foreach ($aErrores as $sCampo => $sError) {
        if ($sError != null) {
            $_REQUEST[$sCampo] = ''; //Limpieza del campo.
            $bEntradaOK = false;
        }
    }
}

/*
 * Si el formulario no ha sido enviado, pone el manejador de errores
 * a false para poder mostrar el formulario.
 */ else {
    $bEntradaOK = false;
}

/*
 * Si el formulario ha sido enviado y no ha tenido errores
 * muestra la información enviada.
 */
if ($bEntradaOK) {
    $aFormulario['usuario'] = $_REQUEST['usuario'];
    $aFormulario['password'] = $_REQUEST['password'];



    echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br />";
    echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br />";
    echo "Método de autenticación: " . $_SERVER['AUTH_TYPE'] . "<br />";
}

/*
 * Si el formulario no ha sido enviado o ha tenido errores
 * muestra el formulario.
 */ else {

    /*
     * Por cada input, el valor por defecto se inicializa al que tiene
     * $_REQUEST, si es que tiene alguno.
     * Si tiene algún error, lo muestra al lado del input.
     */
    ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <fieldset>
                        <table>
                            <tr>
                                <td><label class="obligatorio" for="usuario">Usuario</label></td>
                                <td><label class="obligatorio" for="password">Password</label></td>
                            </tr>
                            <tr>
                                <td><input class="obligatorio" type="text" name="usuario" id="usuario" value="<?php echo $_REQUEST['usuario'] ?? '' ?>"></td>
                                <td><input class="obligatorio" type="text" name="password" id="password" value="<?php echo $_REQUEST['password'] ?? '' ?>"></td>
                            </tr>
                            <tr>
                                <td><?php echo '<span>' . $aErrores['usuario'] . '</span>' ?></td>
                                <td><?php echo '<span>' . $aErrores['password'] . '</span>' ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="submit" name="submit" id="submit" value="Entrar">
                </form>
    <?php
}
?>
        </main>
<?php include_once './elementoFooter.php'; // Footer, ya formateado   ?>
    </body>
</html>