CREATE DATABASE FAMILY;

-- DROP TABLE PerteneceGrupo;
-- DROP TABLE Notificaciones;	
-- DROP TABLE Sigue;
-- DROP TABLE Eventos;
-- DROP TABLE Asiste;
-- DROP TABLE Votos;
-- DROP TABLE Opciones;
-- DROP TABLE Votaciones;
-- DROP TABLE Mensajes;
-- DROP TABLE Respuestas;
-- DROP TABLE Preguntas;
-- DROP TABLE Imagenes;
-- DROP TABLE Publicaciones;
-- DROP TABLE NotificacionesInvitaciones;
-- DROP TABLE Invitaciones;
-- DROP TABLE GruposFamiliares;
-- DROP TABLE Usuarios;


--quite el campo pais por que aun quiero ver bien algo
CREATE TABLE Usuarios( 
	usuario_id SERIAL,
	usuario varchar(25),
	correo varchar(50),
	nombre varchar(50),
	apellido1 varchar(25),
	apellido2 varchar(25),	
	usuario_password varchar(255),
	genero integer,
	fecha_nacimiento date,
	PRIMARY KEY(usuario_id),
	UNIQUE (correo)
);


CREATE TABLE GruposFamiliares(
	grupo_id SERIAL,
	usuario_creador integer,
	tipo varchar(5),
	apellido varchar(100),
    PRIMARY KEY(grupo_id),
	FOREIGN KEY(usuario_creador) REFERENCES Usuarios(usuario_id)
);

CREATE TABLE PerteneceGrupo(
	grupo_id integer,
	usuario_id integer,
	PRIMARY KEY(usuario_id,grupo_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(grupo_id) REFERENCES GruposFamiliares(grupo_id)
);

CREATE TABLE Sigue(
	usuario_seguidor_id integer,
	usuario_seguido_id integer,
    PRIMARY KEY(usuario_seguidor_id,usuario_seguido_id),
	FOREIGN KEY(usuario_seguidor_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(usuario_seguido_id) REFERENCES Usuarios(usuario_id)
);

--PUBLICACIONES

--CAMPO TIPO EXPLICACION
-- V -> Votaciones
-- E -> Eventos
-- A -> Archivos
-- P -> Preguntas
-- M -> Mensajes
CREATE TABLE Publicaciones(
	publicacion_id SERIAL,
	usuario_creador_id integer,
    grupo_id integer,
	tipo varchar(5),
	fecha_creacion timestamp,
	PRIMARY KEY(publicacion_id),
    FOREIGN KEY(usuario_creador_id) REFERENCES Usuarios(usuario_id),
    FOREIGN KEY(grupo_id) REFERENCES GruposFamiliares(grupo_id)
);

CREATE TABLE Notificaciones(
	notificacion_id SERIAL,
    publicacion_id integer,
	usuario_receptor_id integer, --usuario receptor de la notificacion
    estado boolean, --sirve para saber si ya se leyo o no
	mostrar boolean DEFAULT 'true', --sirve para mandarla a traer o no para reducir costos al hacer polling
	PRIMARY KEY(notificacion_id),
    FOREIGN KEY(usuario_receptor_id) REFERENCES Usuarios(usuario_id),
    FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)
);

--ISA DE PUBLICACIONES
--EVENTOS
CREATE TABLE Eventos(
	evento_id SERIAL,
	publicacion_id integer,
	titulo text,
	informacion text,
	fecha date,
    hora time,
	lugar text,
    PRIMARY KEY(evento_id),
	FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)	
);

CREATE TABLE Asiste(
	asiste_id SERIAL,
	evento_id integer,
	usuario_id integer,
    estado integer, --indica asistencia o no
    PRIMARY KEY(asiste_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id)
);

--VOTACIONES
CREATE TABLE Votaciones(
	votacion_id SERIAL,
	publicacion_id integer,
    informacion text,
    PRIMARY KEY(votacion_id),
    FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)
);  

CREATE TABLE Opciones(
    opcion_id SERIAL,
    votacion_id integer,
    informacion text,
    PRIMARY KEY(opcion_id),
    FOREIGN KEY(votacion_id) REFERENCES Votaciones(votacion_id)
);

CREATE TABLE Votos(
    voto_id SERIAL,
    opcion_id integer,
    usuario_id integer,
    PRIMARY KEY(voto_id),
    FOREIGN KEY(opcion_id) REFERENCES Opciones(opcion_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id)    
);

--MENSAJE
CREATE TABLE Mensajes(
    mensaje_id SERIAL,
    publicacion_id integer,
    informacion text,
    PRIMARY KEY(mensaje_id),
    FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)
);

-- PREGUNTAS
CREATE TABLE Preguntas(
	pregunta_id SERIAL,
	publicacion_id integer,
	informacion text,
	PRIMARY KEY(pregunta_id),
    FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)	
);

CREATE TABLE Respuestas(
	respuesta_id SERIAL,
	pregunta_id integer,
	informacion text,
	usuario_id integer,
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(pregunta_id) REFERENCES Preguntas(pregunta_id)
);

--IMAGENES
CREATE TABLE Imagenes( 
	imagen_id SERIAL,
	publicacion_id integer,
	informacion text,
	formato varchar(10),
	PRIMARY KEY(imagen_id),
	FOREIGN KEY(publicacion_id) REFERENCES Publicaciones(publicacion_id)
);

-- CREATE USER social;
ALTER USER social WITH ENCRYPTED PASSWORD '%SocialAdmin18%';
GRANT ALL PRIVILEGES ON DATABASE "FAMILY" TO social;
GRANT ALL PRIVILEGES ON TABLE Usuarios,GruposFamiliares,PerteneceGrupo,Sigue,Publicaciones,Notificaciones,Publicaciones,Eventos,Asiste,Votaciones,Opciones,Votos,Mensajes,Preguntas,Respuestas,Imagenes TO tienda;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public to tienda;



--CAMBIOS REALIZADOS 
ALTER TABLE Usuarios
DROP COLUMN nombre;

ALTER TABLE Usuarios
DROP COLUMN apellido1;

ALTER TABLE Usuarios
DROP COLUMN apellido2;

ALTER TABLE Usuarios
ADD COLUMN apellidos text;

ALTER TABLE Usuarios
ADD COLUMN nombres text;

ALTER TABLE Usuarios
ADD COLUMN pais varchar(25);

ALTER TABLE Usuarios
ADD COLUMN formato_img varchar(10) DEFAULT 'png';

ALTER TABLE Usuarios
ADD COLUMN name_img varchar(25) DEFAULT 'default';

ALTER TABLE Usuarios
ALTER COLUMN usuario_password TYPE varchar(255);

CREATE TABLE Invitaciones(
	invitacion_id SERIAL,
	usuario_emisor_id integer,
	usuario_receptor_id integer,
	grupo_id integer,
	estado boolean DEFAULT 'true',
	fecha_creacion timestamp,
	PRIMARY KEY(invitacion_id),
	UNIQUE(usuario_receptor_id,grupo_id),
	FOREIGN KEY(usuario_emisor_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(usuario_receptor_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(grupo_id) REFERENCES GruposFamiliares(grupo_id)
);

CREATE TABLE NotificacionesInvitaciones(
	notificacion_invitacion_id SERIAL,
	invitacion_id integer,
	estado boolean DEFAULT 'true',
	mostrar boolean DEFAULT 'true', --sirve para mandarla a traer o no para reducir costos al hacer polling
	PRIMARY KEY(notificacion_invitacion_id),
	FOREIGN KEY(invitacion_id) REFERENCES Invitaciones(invitacion_id)
);

ALTER USER social WITH ENCRYPTED PASSWORD '%SocialAdmin18%';
GRANT ALL PRIVILEGES ON DATABASE "FAMILY" TO social;
GRANT ALL PRIVILEGES ON TABLE Usuarios,GruposFamiliares,PerteneceGrupo,Sigue,Publicaciones,Notificaciones,Publicaciones,Eventos,Asiste,Votaciones,Opciones,Votos,Mensajes,Preguntas,Respuestas,Imagenes,Invitaciones,NotificacionesInvitaciones TO social;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public to social;

-- CAMBIOS HECHOS
CREATE TABLE Deseos(
	deseo_id SERIAL,
	nombre text,
	usuario_id integer,
	PRIMARY KEY(deseo_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id),
	UNIQUE(nombre,usuario_id)
);

ALTER USER social WITH ENCRYPTED PASSWORD '%SocialAdmin18%';
GRANT ALL PRIVILEGES ON DATABASE "FAMILY" TO social;
GRANT ALL PRIVILEGES ON TABLE Usuarios,GruposFamiliares,PerteneceGrupo,Sigue,Publicaciones,Notificaciones,Publicaciones,Eventos,Asiste,Votaciones,Opciones,Votos,Mensajes,Preguntas,Respuestas,Imagenes,Invitaciones,NotificacionesInvitaciones,Deseos TO social;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public to social;


-- CAMBIOS HECHOS 11/11/18 7:49 PM
DROP TABLE Sigue;

CREATE TABLE Sigue(
	sigue_id SERIAL,
	usuario_seguidor_id integer,
	usuario_seguido_id integer,
	mostrar boolean DEFAULT 'True',
	PRIMARY KEY(sigue_id),
	UNIQUE(usuario_seguidor_id,usuario_seguido_id),
	FOREIGN KEY(usuario_seguidor_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(usuario_seguido_id) REFERENCES Usuarios(usuario_id)
);

ALTER USER social WITH ENCRYPTED PASSWORD '%SocialAdmin18%';
GRANT ALL PRIVILEGES ON DATABASE "FAMILY" TO social;
GRANT ALL PRIVILEGES ON TABLE Usuarios,GruposFamiliares,PerteneceGrupo,Sigue,Publicaciones,Notificaciones,Publicaciones,Eventos,Asiste,Votaciones,Opciones,Votos,Mensajes,Preguntas,Respuestas,Imagenes,Invitaciones,NotificacionesInvitaciones,Deseos TO social;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public to social;

-- CAMBIOS HECHOS 12/11/18 2:52 AM
ALTER TABLE Usuarios
ADD COLUMN genero varchar(25) DEFAULT 'default';

