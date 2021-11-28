<!DOCTYPE html>
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 24/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - DWES 5-0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
        <style>
            h1{
                text-align: center;
            }
            table{
                margin: auto;
            }
        </style>
    </head>
    <body>
        <header>
            <?php include_once './elementoBtVolver.php'; // Botón de regreso, ya formateado ?>
            <h1>Variables superglobales y phpinfo()</h1>
        </header>
        <main>
            <?php
            /**
             * @author Isabel Martínez Guerra
             * @since 24/11/2021
             * Modificado: 28/11/2021
             * 
             * Mostrado de la variable superglobal $_SERVER y phpinfo().
             */
            
            ?>
            <h1>Variable $_SERVER</h1>
            <table>
                <tr>
                    <th>Clave</th>
                    <th>Valor</th>
                </tr>
            <?php
            foreach ($_SERVER as $key => $value) {
                echo '<tr>';
                echo "<td>$key</td>";
                echo "<td>$value</td>";
                echo '</tr>';
            }
            echo '</table><hr>';

            
            phpinfo();
            ?>
        </main>
        <?php include_once './elementoFooter.php'; // Footer, ya formateado ?>
    </body>
</html>
