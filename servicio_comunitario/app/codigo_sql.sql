
---------------------------------------------------------CREATES--------------------------------------------------------------------
CREATE TABLE ROL(
	id_rol integer not null auto_increment primary key, 
	tipo_rol char(1) not null
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
	id_universidad integer not null auto_increment primary key,
	nombre_universidad varchar(100) not null,
	acronimo varchar(10) not null,
	codigo_inscripcion varchar(20) not null,
	direccion_universidad text,
	imagen_universidad text,
	rif_universidad varchar(30)
);

CREATE TABLE DISCIPLINA(
	id_disciplina integer not null auto_increment primary key,
	nombre_disciplina varchar(50) not null
);

CREATE TABLE EQUIPO(
	id_equipo integer not null auto_increment primary key,
	nombre_equipo varchar(50) not null,
	genero_equipo char(1) not null,
	fk_disciplina integer not null
);								


CREATE TABLE USU_EQUI_UNI(
	representante boolean,
	rol_equipo varchar(50),
	fk_usuario integer,
	fk_universidad integer not null,
	fk_equipo integer not null
);

CREATE TABLE TORNEO(
	id_torneo integer not null auto_increment primary key,
	nombre_torneo varchar(50) not null,
	fecha_inicio date not null,
	fecha_fin date,
	tipo_torneo varchar(50) not null
);

CREATE TABLE TOR_EQUI(
	puntuacion integer not null,
	fk_torneo integer not null,
	fk_equipo integer not null
);

CREATE TABLE CANCHA(
	id_cancha integer not null auto_increment primary key,
	disponibilidad varchar(50),
	imagen_cancha text
);

CREATE TABLE PARTIDO(
	id_partido integer not null auto_increment primary key,
	fecha_partido date not null,
	puntos_equipo1 integer,
	puntos_equipo2 integer,
	fk_torneo integer not null,
	fk_equipo1 integer not null,
	fk_equipo2 integer not null,
	fk_cancha integer not null
);

CREATE TABLE INSCRIPCION (
	id_inscripcion integer NOT NULL,
  	fecha_limite date
);

---------------------------------------------------------CONSTRAINTS-----------------------------------------------------------------


ALTER TABLE USUARIO ADD FOREIGN KEY (fk_rol) REFERENCES ROL(id_rol) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_usuario) REFERENCES USUARIO(cedula) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_universidad) REFERENCES UNIVERSIDAD(id_universidad) ON DELETE CASCADE;
ALTER TABLE EQUIPO ADD FOREIGN KEY (fk_disciplina) REFERENCES DISCIPLINA(id_disciplina) ON DELETE CASCADE;
ALTER TABLE USU_EQUI_UNI ADD FOREIGN KEY (fk_equipo) REFERENCES EQUIPO(id_equipo) ON DELETE CASCADE;
ALTER TABLE TOR_EQUI ADD FOREIGN KEY (fk_torneo) REFERENCES TORNEO(id_torneo) ON DELETE CASCADE;
ALTER TABLE TOR_EQUI ADD FOREIGN KEY (fk_equipo) REFERENCES EQUIPO(id_equipo) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_torneo) REFERENCES TORNEO(id_torneo) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_equipo1) REFERENCES EQUIPO(id_equipo) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_equipo2) REFERENCES EQUIPO(id_equipo) ON DELETE CASCADE;
ALTER TABLE PARTIDO ADD FOREIGN KEY (fk_cancha) REFERENCES CANCHA(id_cancha) ON DELETE CASCADE;

---------------------------------------------------------INSERTS-----------------------------------------------------------------

INSERT INTO ROL VALUES(1, 'A');
INSERT INTO ROL VALUES(2, 'D');
INSERT INTO ROL VALUES(3, 'U');

INSERT INTO DISCIPLINA VALUES(1, 'FUTBOL CAMPO');
INSERT INTO DISCIPLINA VALUES(2, 'FUTBOL SALA');
INSERT INTO DISCIPLINA VALUES(3, 'VOLEIBOL');
INSERT INTO DISCIPLINA VALUES(4, 'BASKET');
INSERT INTO DISCIPLINA VALUES(5, 'TENIS DE MESA');
