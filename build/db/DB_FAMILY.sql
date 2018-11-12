CREATE DATABASE FAMILY;

--USUARIOS
CREATE TABLE Usuarios( 
	usuario_id SERIAL,
	usuario varchar(25),
	correo varchar(50),
	nombres text,
    apellidos text,
    pais varchar(25),
	usuario_password varchar(255),
	genero varchar(25),
    fecha_nacimiento date,
    formato_img varchar(10) DEFAULT 'png',
    name_img varchar(25) DEFAULT 'default',
	PRIMARY KEY(usuario_id),
	UNIQUE(usuario)
);

--GRUPOS FAMILIARES
CREATE TABLE GruposFamiliares(
	grupo_id SERIAL,
	usuario_creador integer,
	tipo varchar(5),
	apellido varchar(100),
    PRIMARY KEY(grupo_id),
	FOREIGN KEY(usuario_creador) REFERENCES Usuarios(usuario_id)
);

--LISTA DE PERTENECE A GRUPOS
CREATE TABLE PerteneceGrupo(
	grupo_id integer,
	usuario_id integer,
	PRIMARY KEY(usuario_id,grupo_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id),
	FOREIGN KEY(grupo_id) REFERENCES GruposFamiliares(grupo_id)
);

--LISTA DE DESEOS
CREATE TABLE Deseos(
	deseo_id SERIAL,
	nombre text,
	usuario_id integer,
	PRIMARY KEY(deseo_id),
	FOREIGN KEY(usuario_id) REFERENCES Usuarios(usuario_id),
	UNIQUE(nombre,usuario_id)
);

--LISTA DE SEGUIDORES
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

--INVITACIONES
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

--PUBLICACIONES
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

--NOTIFICACIONES
    --NOTIFICACIONES DE PULBICACIONES
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

    --NOTIFICACIONES DE INVITACIONES A GRUPOS
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
GRANT ALL PRIVILEGES ON TABLE Usuarios,GruposFamiliares,PerteneceGrupo,Sigue,Publicaciones,Notificaciones,Publicaciones,Eventos,Asiste,Votaciones,Opciones,Votos,Mensajes,Preguntas,Respuestas,Imagenes,Invitaciones,NotificacionesInvitaciones,Deseos TO social;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public to social;

