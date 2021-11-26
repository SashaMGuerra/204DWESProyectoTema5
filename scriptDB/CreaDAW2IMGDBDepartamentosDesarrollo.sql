/* Creación de la base de datos */
CREATE DATABASE IF NOT EXISTS DB204DWESProyectoTema5;

USE DB204DWESProyectoTema5;

/* Creación de las tablas */
CREATE TABLE IF NOT EXISTS Usuario(
    CodUsuario VARCHAR(100) PRIMARY KEY,
    DescUsuario VARCHAR(300) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Perfil VARCHAR(100) NULL
) engine=innodb;

/* Creación del usuario */
CREATE USER IF NOT EXISTS 'user204DWESProyectoTema5'@'%' IDENTIFIED BY 'paso';
GRANT ALL ON DB204DWESProyectoTema5.* TO 'user204DWESProyectoTema5'@'%';