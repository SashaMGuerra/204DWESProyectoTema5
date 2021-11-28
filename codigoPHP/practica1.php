<!DOCTYPE html>
<?php
/**
 * @author Isabel Martínez Guerra
 * @since 25/11/2021
 * 
 * Control de acceso con identificación de usuario basado en header();
 */

/**
 * Si no se ha introducido ningún usuario, o si la combinación de usuario y 
 * contraseña no corresponde a "admin" y "paso", pide introducirse.
 */
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!='admin' || $_SERVER['PHP_AUTH_PW']!='paso') {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized'); // Envía un error de acceso no autorizado.
    echo "Usuario no reconocido!";
    exit; // Tras dar error e indicar que el usuario es incorrecto, sale.
}

/**
 * Si el usuario y clave introducidos son correctos, muestra la información
 * introducido.
 */
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
            <?php include_once './elementoBtVolver.php'; // Botón de regreso ?>
            <h1>Control de acceso con identificación de usuario: header()</h1>
        </header>
        <main>
            <?php
                echo "<div>Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "</div>";
                echo "<div>Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "</div>";
            ?>
        </main>
        <?php include_once './elementoFooter.php'; // Footer ?>
    </body>
</html>
<?php
}