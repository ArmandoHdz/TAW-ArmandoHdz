CREATE DATABASE DB_CAI;
USE DB_CAI;



CREATE TABLE NIVEL(
	id_nivel int primary key AUTO_INCREMENT,
    nombre varchar(10) not null
);

CREATE TABLE GRUPO(
	id_grupo int primary key AUTO_INCREMENT,
    nombre varchar(10) not null, 
    id_nivel int not null,
    foreign key (id_nivel) references NIVEL(id_nivel)
);

CREATE TABLE UNIDAD(
	id_unidad int primary key AUTO_INCREMENT,
    horas int not null,
    id_grupo int not null,
    foreign key (id_grupo) references GRUPO(id_grupo)
);

CREATE TABLE MAESTRO(
	id_maestro int primary key AUTO_INCREMENT,
    nombre_completo varchar(100) not null,
    id_grupo int not null,
    foreign key (id_grupo) references GRUPO(id_grupo)
);

CREATE TABLE ESTUDIANTES(
	matricula int(7) primary key AUTO_INCREMENT,
    nombre_completo varchar(100) not null,
    id_grupo int not null,
	foreign key (id_grupo) references GRUPO(id_grupo)
);

CREATE TABLE ACTIVIDAD(
	id_actividad int primary key AUTO_INCREMENT,
    nombre_act varchar(30) not null
);

CREATE TABLE USUARIO(
	id_usuario int primary key AUTO_INCREMENT,
    nombre_completo varchar(100) not null,
    nombre_usu varchar(30) not null,
    contrasena varchar(30) not null
);

CREATE TABLE HISTORIAL(
	id_registro int primary key AUTO_INCREMENT,
	hora_inicio time not null,
    hora_salida time not null,
    nivel int not null,
    grupo int not null,
    matricula int not null,
    maestro int not null,
    actividad int not null,   
    foreign key (nivel) references NIVEL(id_nivel),
    foreign key (grupo) references GRUPO(id_grupo),
    foreign key (matricula) references ESTUDIANTES(matricula),
    foreign key (maestro) references MAESTRO(id_maestro),
    foreign key (actividad) references ACTIVIDAD(id_actividad)
);