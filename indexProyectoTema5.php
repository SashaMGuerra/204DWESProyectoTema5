<!DOCTYPE html>
<!--
    Autor: Isabel Martínez Guerra
    Fecha: 24/11/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - Tema 5</title>
        <link href="webroot/css/commonTema5.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/indexProyectoTema5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <a class="volver" href="../proyectoDWES/indexProyectoDWES.php">Volver</a>
            <h1>Desarrollo Web en Entorno Servidor</h1>
            <h2>Proyecto Tema 5</h2>
        </header>
        <main>
            <table>
                <tr>
                    <th>Enunciado</th>
                    <th>Ejecutar</th>
                    <th>Mostrar</th>
                </tr>
                <tr>
                    <td class="enunciado">0. Mostrar el contenido de las variables superglobales y phpinfo().</td>
                    <td><a href="codigoPHP/practica0.php"><img src="webroot/media/img/execute-icon.jpg" alt="ejecutar"/></a></td>
                    <td><a href="mostrarcodigo/mostrarCodigo0.php"><img src="webroot/media/img/doc_icon.png" alt="ver"/></a></td>
                </tr>
                <tr>
                    <td class="enunciado">1.  Desarrollo de un control de acceso con identificación del usuario basado en la función header().</td>
                    <td><a href="codigoPHP/practica1.php"><img src="webroot/media/img/execute-icon.jpg" alt="ejecutar"/></a></td>
                    <td><a href="mostrarcodigo/mostrarCodigo1.php"><img src="webroot/media/img/doc_icon.png" alt="ver"/></a></td>
                </tr>
                <tr>
                    <td class="enunciado">2.   Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de una tabla “Usuario” de la base de datos.</td>
                    <td><a href="codigoPHP/practica2.php"><img src="webroot/media/img/execute-icon.jpg" alt="ejecutar"/></a></td>
                    <td><a href="mostrarcodigo/mostrarCodigo2.php"><img src="webroot/media/img/doc_icon.png" alt="ver"/></a></td>
                </tr>
            </table>
        </main>
        <?php include_once './codigoPHP/elementoFooter.php'; // Footer ?>
    </body>
</html>
