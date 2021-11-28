<!DOCTYPE html>
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 28/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - Mostrar fichero de configuración</title>
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <?php include_once '../codigoPHP/elementoBtVolver.php'; // Botón de regreso?>
            <h1>Fichero de configuración de la base de datos.</h1>
        </header>
        <main>
            <?php
            /*
             * @author Isabel Martínez Guerra
             * @since 15/11/2021
             * Fecha última modificación: 28/11/2021
             * 
             * Mostrado de los ficheros de configuración de la base de datos.
             */

            highlight_file('../config/configDB.php');
            ?>
        </main>
        <?php include_once '../codigoPHP/elementoFooter.php'; //Footer ?>
    </body>
</html>
