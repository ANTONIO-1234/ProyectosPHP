DROP DATABASE IF EXISTS ejemplo03aplicacion;
CREATE DATABASE ejemplo03aplicacion;
USE ejemplo03aplicacion;

CREATE TABLE actividades(
  id int AUTO_INCREMENT,
  nombre varchar (100),
  descripcion varchar (200),
  imagen varchar (100),
  duracion int,
  PRIMARY KEY (id)
);

CREATE TABLE salas(
  id int AUTO_INCREMENT,
  nombre varchar (100),
  plazas int,
  descripcion varchar (200),
  imagen varchar (100),
  PRIMARY KEY (id)
);

CREATE TABLE monitor(
  id int AUTO_INCREMENT,
  nombre varchar (100),
  imagen varchar (100),
  telefono varchar (9),
  correo varchar (50),
  PRIMARY KEY (id)
);

CREATE TABLE realizan(
  id int AUTO_INCREMENT,
  actividad int,
  sala int,
  monitor int,
  fechahora datetime,
  PRIMARY KEY (id)
);

ALTER TABLE realizan
  ADD CONSTRAINT fkRealizaActividad FOREIGN KEY (actividad) REFERENCES actividades(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fkRealizaSala FOREIGN KEY (sala) REFERENCES salas(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fkRealizaMonitor FOREIGN KEY (monitor) REFERENCES monitor(id)
    ON DELETE CASCADE ON UPDATE CASCADE;

CREATE VIEW trabajador AS
    SELECT * FROM 
    (SELECT COUNT(*) numero, r.monitor FROM realizan r GROUP BY r.monitor) c2
    WHERE numero = (SELECT MAX(numero) maximo FROM 
    (SELECT COUNT(*) numero, r.monitor FROM realizan r GROUP BY r.monitor) c1);