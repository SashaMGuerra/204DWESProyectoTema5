/**
 * Author:  Isabel Martínez Guerra
 * Fecha de creación: 28/11/2021

 * Script de carga inicial en tablas.
 */

/* Inserción en tablas */
USE DB204DWESProyectoTema5;

-- Inserción de usuarios no administradores.
INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario) VALUES
    ('albertoF','paso','AlbertoF'),
    ('outmane','paso','Outmane'),
    ('rodrigo','paso','Rodrigo'),
    ('isabel','paso','Isabel'),
    ('david','paso','David'),
    ('aroa','paso','Aroa'),
    ('johanna','paso','Johanna'),
    ('oscar','paso','Oscar'),
    ('sonia','paso','Sonia'),
    ('heraclio','paso','Heraclio'),
    ('amor','paso','Amor'),
    ('antonio','paso','Antonio'),
    ('albertoB','paso','AlbertoB');

-- Inserción de usuarios administradores.
INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
    ('admin','paso','Admin','administrador');

INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio) VALUES
    ('INF','Departamento de Informatica',1.5),
    ('BIO','Departamento de Biologia',2.5),
    ('ING','Departamento de Inglés',3.5),
    ('LEN','Departamento de Lengua',4.5),
    ('MUS','Departamento de Musica',1.5);