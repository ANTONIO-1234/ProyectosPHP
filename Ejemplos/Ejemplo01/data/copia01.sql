DROP DATABASE IF EXISTS ejemplo01Aplicacion;
CREATE DATABASE ejemplo01Aplicacion;
USE ejemplo01Aplicacion;

CREATE TABLE coches(
  bastidor varchar(10),
  matricula varchar(8) NOT NULL,
  modelo varchar(100),
  marca varchar(100) NOT NULL,
  cilindrada int,
  tipo enum('turismo', 'suv', 'furgoneta', '4x4'),
  fechaCompra date,
  PRIMARY KEY (bastidor),
  UNIQUE KEY (matricula)
);

CREATE TABLE clientes(
  nif varchar(10),
  nombre varchar(100),
  apellidos varchar(100),
  poblacion varchar(100),
  telefono varchar(100) NOT NULL,
  correo varchar(100) NOT NULL,
  PRIMARY KEY (nif),
  UNIQUE KEY (correo)
);

CREATE TABLE alquiler(
  idAlquiler int AUTO_INCREMENT,
  cliente varchar(10),
  coche varchar(10),
  fechaAlquiler datetime,
  PRIMARY KEY (idAlquiler),
  UNIQUE KEY(idAlquiler, cliente, coche)
);

ALTER TABLE alquiler
  ADD CONSTRAINT fk1 FOREIGN KEY (cliente) REFERENCES clientes (nif)
    ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk2 FOREIGN KEY (coche) REFERENCES coches (bastidor)
    ON DELETE CASCADE ON UPDATE CASCADE;