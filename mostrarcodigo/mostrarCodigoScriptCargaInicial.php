<!DOCTYPE html>
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 29/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - Mostrar script de carga inicial</title>
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <?php include_once '../codigoPHP/elementoBtVolver.php'; // Botón de regreso?>
            <h1>Fichero de carga inicial de la base de datos.</h1>
        </header>
        <main>
            <?php
            /*
             * @author Isabel Martínez Guerra
             * @since 29/11/2021
             * Fecha última modificación: 29/11/2021
             * 
             * Mostrado del fichero de carga inicial de las tablas.
             */

            highlight_file("../scriptDB/CargaInicialDAW204DBDepartamentosDesarrollo.sql");
            ?>
        </main>
        <?php include_once '../codigoPHP/elementoFooter.php'; //Footer ?>
    </body>
</html>
