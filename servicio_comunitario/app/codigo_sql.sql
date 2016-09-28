
---------------------------------------------------------CREATES--------------------------------------------------------------------
CREATE TABLE ROL(
	id integer not null auto_increment primary key, 
	tipo char(1) not null
);

CREATE TABLE USUARIO(
	cedula integer not null primary key,
	usuario varchar(30) not null,
	password varchar(255) not null,
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

CREATE TABLE UNIVERSIDAD(
	id integer not null auto_increment primary key,
	nombre varchar(100) not null,
	acronimo varchar(10) not null,
	codigo_inscripcion integer not null,
	direccion text,
	imagen text,
	rif varchar(30)
);

CREATE TABLE DISCIPLINA(
	id integer not null auto_increment primary key,
	nombre varchar(50) not null,
	modalidad varchar(50) not null
);

CREATE TABLE EQUIPO(
	id integer not null auto_increment primary key,
	nombre varchar(50) not null,
	fk_disciplina integer not null
);								


CREATE TABLE USU_EQUI_UNI(
	representante boolean,
	fk_usuario integer,
	fk_universidad integer not null,
	fk_equipo integer not null
);

CREATE TABLE TORNEO(
	id integer not null auto_increment primary key,
	nombre varchar(50) not null,
	fecha_inicio date not null,
	fecha_fin date,
	tipo varchar(50) not null
);

CREATE TABLE TOR_EQUI(
	puntuacion integer not null,
	fk_torneo integer not null,
	fk_equipo integer not null
);

CREATE TABLE CANCHA(
	id integer not null auto_increment primary key,
	disponibilidad varchar(50),
	imagen text
);

CREATE TABLE PARTIDO(
	id integer not null auto_increment primary key,
	fecha date not null,
	puntos_equipo1 integer,
	puntos_equipo2 integer,
	fk_torneo integer not null,
	fk_equipo1 integer not null,
	fk_equipo2 integer not null,
	fk_cancha integer not null
);



---------------------------------------------------------CONSTRAINTS-----------------------------------------------------------------


ALTER TABLE USUARIO ADD FOREIGN KEY (fk_rol) REFERENCES ROL(id) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_usuario) REFERENCES USUARIO(cedula) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_universidad) REFERENCES UNIVERSIDAD(id) ON DELETE CASCADE;
ALTER TABLE EQUIPO ADD FOREIGN KEY (fk_disciplina) REFERENCES DISCIPLINA(id) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_equipo) REFERENCES EQUIPO(id) ON DELETE CASCADE;
ALTER TABLE TOR_EQUI ADD FOREIGN KEY (fk_torneo) REFERENCES TORNEO(id) ON DELETE CASCADE;
ALTER TABLE TOR_EQUI ADD FOREIGN KEY (fk_equipo) REFERENCES EQUIPO(id) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_torneo) REFERENCES TORNEO(id) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_equipo1) REFERENCES EQUIPO(id) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_equipo2) REFERENCES EQUIPO(id) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_cancha) REFERENCES CANCHA(id) ON DELETE CASCADE;

---------------------------------------------------------INSERTS-----------------------------------------------------------------

INSERT INTO ROL VALUES(1, 'A');
INSERT INTO ROL VALUES(2, 'D');
INSERT INTO ROL VALUES(3, 'U');