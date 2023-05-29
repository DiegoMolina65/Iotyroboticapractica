CREATE DATABASE panaderia;

USE panaderia;

CREATE TABLE recetas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    tipo_pan VARCHAR(50) NOT NULL,
    ingredientes TEXT NOT NULL,
    instrucciones TEXT NOT NULL,
    tiempo_preparacion INT(11) NOT NULL,
    dificultad VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);
