<!DOCTYPE html>
<?php
/**
 * @author Isabel Martínez Guerra
 * @since 25/11/2021
 * 
 * Control de acceso con identificación de usuario basado en header();
 */


if (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER']!='admin' && $_SERVER['PHP_AUTH_USER']!='paso')) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized'); // Envía un error de acceso no autorizado.
    echo "Usuario no reconocido!";
    exit;
}
else{


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
            <?php include_once './elementoBtVolver.php'; // Botón de regreso, ya formateado    ?>
            <h1>Control de acceso con identificación de usuario: header()</h1>
        </header>
        <main>
            <?php
                echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br />";
                echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br />";
            ?>
        </main>
        <?php include_once './elementoFooter.php'; // Footer, ya formateado  ?>
    </body>
</html>
<?php
}