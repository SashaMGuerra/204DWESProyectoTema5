/**
 * Author:  Isabel Martínez Guerra
 * Fecha de creación: 25/11/2021

 * Script creación de base de datos, tablas y usuario de conexión.
 */

/* Creación de la base de datos */
CREATE DATABASE IF NOT EXISTS DB204DWESProyectoTema5;

USE DB204DWESProyectoTema5;

/* Creación de las tablas */
CREATE TABLE IF NOT EXISTS T01_Usuario(
    T01_CodUsuario VARCHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(64) NOT NULL, -- 64 porque el largo máximo es de 8 caracteres, más su codificación en SHA2.
    T01_DescUsuario VARCHAR(255) NOT NULL, -- Contiene nombre y apellidos del usuario.
    T01_FechaHoraUltimaConexion DATETIME NOT NULL DEFAULT NOW(),
    T01_NumConexiones INT DEFAULT 1 NOT NULL,
    T01_Perfil ENUM('administrador', 'usuario') DEFAULT 'usuario',
    T01_ImagenUsuario MEDIUMBLOB NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS T02_Departamento(
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento DATETIME NOT NULL DEFAULT NOW(),
    T02_VolumenDeNegocio FLOAT NOT NULL,
    T02_FechaBajaDepartamento DATETIME NULL
) ENGINE=INNODB;

/* Creación del usuario */
CREATE USER IF NOT EXISTS 'User204DWESProyectoTema5'@'%' IDENTIFIED BY 'paso';
GRANT ALL ON DB204DWESProyectoTema5.* TO 'User204DWESProyectoTema5'@'%';

/* Trigger para la codificación de contraseñas al ser introducido un usuario */
CREATE TRIGGER codificarPASSWORD BEFORE INSERT ON T01_Usuario
FOR EACH ROW SET NEW.T01_Password = SHA2(CONCAT(NEW.T01_CodUsuario, NEW.T01_Password), 256);