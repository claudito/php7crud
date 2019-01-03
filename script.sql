
-- crear base de datos
CREATE DATABASE virtual;

-- usar la base de datos
USE virtual;

-- CREAR LA TABLA
CREATE TABLE usuario(

id int auto_increment PRIMARY KEY,
nombres varchar(200),
apellidos varchar(200),
fecha_nacimiento date

)

