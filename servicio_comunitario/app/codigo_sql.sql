
---------------------------------------------------------CREATES--------------------------------------------------------------------
CREATE TABLE ROL(
	id integer not null, 
	tipo varchar(30) not null
);

CREATE TABLE USUARIO(
	cedula integer not null,
	password varchar(30) not null,
	primer_nombre varchar(30) not null,
	segundo_nombre varchar(30),
	primer_apellido varchar(30) not null,
	segundo_apellido varchar(30) not null,
	correo varchar(30) not null,
	fecha_nacimiento date not null,
	sexo char(1) not null,
	foto text not null,
	dni text not null,
	fk_rol integer not null
);

---------------------------------------------------------CONSTRAINTS-----------------------------------------------------------------

ALTER TABLE ROL ADD PRIMARY KEY (id);
ALTER TABLE USUARIO ADD PRIMARY KEY (cedula);




---------------------------------------------------------INSERTS-----------------------------------------------------------------

INSERT INTO ROL VALUES(1, 'A');
INSERT INTO ROL VALUES(2, 'B');
INSERT INTO ROL VALUES(3, 'C');