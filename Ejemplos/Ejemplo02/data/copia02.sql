DROP DATABASE IF EXISTS ejemplo02Aplicacion;
CREATE DATABASE ejemplo02Aplicacion;
USE ejemplo02Aplicacion;

CREATE TABLE productos(
  id int AUTO_INCREMENT,
  nombre varchar(100),
  peso float,
  PRIMARY KEY (id)
);

CREATE TABLE clientes(
  id int AUTO_INCREMENT,
  nombre varchar(100),
  PRIMARY KEY (id)
);

CREATE TABLE compran(
  idCompran int AUTO_INCREMENT,
  idCliente int,
  idProducto int,
  fecha date,
  cantidad int,
  PRIMARY KEY (idCompran),
  UNIQUE KEY (idCliente, idProducto, fecha)
);

ALTER TABLE compran
  ADD CONSTRAINT fk1 FOREIGN KEY (idCliente) REFERENCES clientes(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk2 FOREIGN KEY (idProducto) REFERENCES productos(id)
    ON DELETE CASCADE ON UPDATE CASCADE;