#Crear tabla usuarios

create table usuarios (
id int(11) auto_increment primary key, 
nombre varchar(30) binary not null, 
user varchar(15) binary not null, 
password varchar(10) binary not null, 
role int(1) default 1 not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Crear tabla desarrolladores

create table desarrolladores (
id int(11) auto_increment primary key,
nombre varchar(30) not null,
email varchar(70) not null,
grupo varchar(20) not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

#Crear tabla grupos

create table grupos (
id int(11) auto_increment primary key,
grupo varchar(20) not null,
permisos int(1) not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

#crear tabla proyectos

create table proyectos (
id int(11) auto_increment primary key,
descripcion varchar(90) not null,
desarrollador varchar(30) not null,
estado varchar(10) not null,
commits int(11) not null,
last_change date not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

#crear tabla permisos

create table permisos (
id int(11) auto_increment primary key,
tipo varchar(6) not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8;