CREATE DATABASE strangerThings;
USE strangerthings;

CREATE TABLE actores(
	id int auto_increment not null,
    nombre varchar(30) not null,
    apellido varchar(50) not null,
    edad int not null,
    genero varchar(30) not null,
    temporadas int not null,
    personaje varchar(30) not null,
    rol varchar(40) not null,
    imagen varchar(30),
    descripcion TEXT,
    primary key(id)
);

CREATE TABLE mounstros(
    id int auto_increment not null,
    nombre varchar(50) not null,
    debilidad varchar(50) not null,
    aparicion int not null,
    armas varchar(50),
    descripcion TEXT,
    imagen varchar(30),
    primary key(id)
);

CREATE TABLE usuarios(
    id int auto_increment not null,
    nombre varchar(30) not null,
    apellido varchar(50) not null,
    correo varchar(50) not null,
    clave varchar(50) not null,
    rol varchar(50) not null,
    primary key(id)
);

INSERT INTO usuarios(nombre, apellido, correo, clave, rol) VALUES(
    'Sebastian',
    'Pabon Lopez',
    'pabonlopezsebastian@gmail.com',
    '123',
    'ADMIN'
);

INSERT INTO 
actores (
    nombre, 
    apellido, 
    edad, 
    genero, 
    temporadas, 
    personaje,
    rol,
    imagen,
    descripcion
) VALUES (
    'Millie',
    'Bobby Brown',
    18,
    'femenino',
    4,'once',
    'principal',
    'millie-bobby-brown.webp',
    'Once (nombre original en inglés: Eleven) también conocida como Ce, nacida como Jane Ives y legalmente llamada Jane Hopper, es un personaje ficticio de la serie original de Netflix, Stranger Things, interpretada por Millie Bobby Brown. Once es una joven con habilidades psíquicas y un limitado vocabulario'
);

INSERT INTO 
actores (
    nombre, 
    apellido, 
    edad, 
    genero, 
    temporadas, 
    personaje,
    rol,
    imagen,
    descripcion
) VALUES (
    'Finn',
    'Wolfhard',
    19,
    'masculino',
    4,
    'Mike Wheeler',
    'novio de ce',
    'finn-wolfhard.webp',
    'Michael Wheeler es un personaje ficticio de la serie de terror de ciencia ficción de Netflix Stranger Things . Es uno de los personajes centrales de la serie, actuando como líder del grupo principal de niños.'
);

INSERT INTO
mounstros(
    nombre,
    debilidad,
    aparicion,
    armas,
    descripcion,
    imagen
) VALUES(
    'demogorgon',
    'calor',
    8,
    'Fuerza, Dureza, Detección de sangre, Viaje Interdimensional, Telequinesis',
    'El monstruo (apodado el Demogorgon por Mike y sus amigos) era una criatura humanoide depredadora que vivía en la dimensión paralela conocida como el Mundo del Revés.',
    'demogorgon.jpg'
);