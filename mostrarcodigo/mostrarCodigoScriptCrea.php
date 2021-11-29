<!DOCTYPE html>
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 29/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - Mostrar script de creación</title>
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <?php include_once '../codigoPHP/elementoBtVolver.php'; // Botón de regreso?>
            <h1>Fichero de creación de la base de datos.</h1>
        </header>
        <main>
            <?php
            /*
             * @author Isabel Martínez Guerra
             * @since 29/11/2021
             * Fecha última modificación: 29/11/2021
             * 
             * Mostrado del fichero de creación de la base de datos, tablas y
             * usuario.
             */

            highlight_file("../scriptDB/CreaDAW2IMGDBDepartamentosDesarrollo.sql");
            ?>
        </main>
        <?php include_once '../codigoPHP/elementoFooter.php'; //Footer ?>
    </body>
</html>
