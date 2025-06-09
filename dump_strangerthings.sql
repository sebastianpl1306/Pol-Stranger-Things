CREATE DATABASE strangerThings;
USE strangerthings;

CREATE TABLE temporadas(
    id int auto_increment not null,
    numero int not null,
    titulo varchar(30) not null,
    fecha_lanzamiento date not null,
    episodios int not null,
    imagen varchar(30),
    descripcion TEXT,
    primary key(id)
);

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

CREATE TABLE monstruos(
    id int auto_increment not null,
    nombre varchar(50) not null,
    debilidad varchar(50) not null,
    aparicion int not null,
    armas TEXT,
    descripcion TEXT,
    imagen varchar(30),
    first_appearance_season_id int not null,
    foreign key(first_appearance_season_id) references temporadas(id),
    primary key(id)
);

CREATE TABLE datos_curiosos(
    id int auto_increment not null,
    titulo varchar(50) not null,
    descripcion TEXT,
    imagen varchar(30),
    temporada_id int not null,
    foreign key(temporada_id) references temporadas(id),
    primary key(id)
);

CREATE TABLE personaje_temporada(
    id int auto_increment not null,
    personaje varchar(30) not null,
    temporada_id int not null,
    actor_id int not null,
    foreign key(temporada_id) references temporadas(id),
    foreign key(actor_id) references actores(id),
    primary key(id)
);

CREATE TABLE monstruo_temporada(
    id int auto_increment not null,
    monstruo_id int not null,
    temporada_id int not null,
    foreign key(monstruo_id) references monstruos(id),
    foreign key(temporada_id) references temporadas(id),
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

CREATE TABLE favoritos(
    id int auto_increment not null,
    usuario_id int not null,
    temporada_id int not null,
    actor_id int not null,
    monstruo_id int not null,
    foreign key(usuario_id) references usuarios(id),
    foreign key(temporada_id) references temporadas(id),
    foreign key(actor_id) references actores(id),
    foreign key(monstruo_id) references monstruos(id),
    primary key(id)
);

INSERT INTO usuarios(nombre, apellido, correo, clave, rol) VALUES(
    'Sebastian',
    'Pabon Lopez',
    'admin@gmail.com',
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

INSERT INTO temporadas (numero, titulo, fecha_lanzamiento, episodios, imagen, descripcion) VALUES
(1, 'Stranger Things', '2016-07-15', 8, 'stranger_things_s1.jpg', 'La desaparición de un niño desencadena una serie de eventos sobrenaturales en Hawkins, Indiana, incluyendo la aparición de una niña con habilidades psíquicas.'),
(2, 'Stranger Things 2', '2017-10-27', 9, 'stranger_things_s2.jpg', 'Un año después del regreso de Will, una nueva amenaza del Upside Down emerge, mientras los personajes lidian con las secuelas de los eventos anteriores.'),
(3, 'Stranger Things 3', '2019-07-04', 8, 'stranger_things_s3.jpg', 'Durante el verano de 1985, el grupo enfrenta nuevas amenazas mientras disfrutan de su adolescencia y descubren secretos oscuros en Hawkins.'),
(4, 'Stranger Things 4', '2022-05-27', 9, 'stranger_things_s4.jpg', 'La historia se expande más allá de Hawkins, revelando orígenes del Upside Down y enfrentando a los personajes con nuevos horrores.'),
(5, 'Stranger Things 5', '2025-10-01', 8, 'stranger_things_s5.jpg', 'La temporada final promete cerrar las historias de los personajes mientras enfrentan la batalla definitiva contra las fuerzas del Upside Down.');

INSERT INTO
monstruos(
    nombre,
    debilidad,
    aparicion,
    armas,
    descripcion,
    imagen,
    first_appearance_season_id
) VALUES(
    'demogorgon',
    'calor',
    8,
    'Fuerza, Dureza, Detección de sangre, Viaje Interdimensional, Telequinesis',
    'El monstruo (apodado el Demogorgon por Mike y sus amigos) era una criatura humanoide depredadora que vivía en la dimensión paralela conocida como el Mundo del Revés.',
    'demogorgon.jpg',
    1
);

CREATE TABLE episodios (
    id INT AUTO_INCREMENT NOT NULL,
    numero INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    duracion INT,
    fecha_emision DATE,
    descripcion TEXT,
    imagen VARCHAR(100),
    temporada_id INT NOT NULL,
    FOREIGN KEY (temporada_id) REFERENCES temporadas(id),
    PRIMARY KEY(id)
);

INSERT INTO episodios (numero, titulo, duracion, fecha_emision, descripcion, imagen, temporada_id) VALUES
(1, 'La desaparición de Will Byers', 49, '2016-07-15', 'Will Byers desaparece misteriosamente y sus amigos comienzan una búsqueda desesperada.', 's1e1.jpg', 1),
(2, 'La chica rara', 55, '2016-07-15', 'Mike y sus amigos esconden a una extraña niña calva con poderes psíquicos.', 's1e2.jpg', 1);
INSERT INTO episodios (numero, titulo, duracion, fecha_emision, descripcion, imagen, temporada_id) VALUES
(1, 'MADMAX', 48, '2017-10-27', 'Una nueva chica llega al pueblo mientras Will sigue teniendo visiones del Upside Down.', 's2e1.jpg', 2),
(2, 'Trucos o Tratos, Bicho Raro', 52, '2017-10-27', 'Es Halloween y los chicos notan que algo no está bien con Will.', 's2e2.jpg', 2);
INSERT INTO episodios (numero, titulo, duracion, fecha_emision, descripcion, imagen, temporada_id) VALUES
(1, 'Suzie, ¿me copias?', 51, '2019-07-04', 'La pandilla disfruta del verano mientras nuevas amenazas comienzan a surgir en Hawkins.', 's3e1.jpg', 3),
(2, 'Ratas de centro comercial', 50, '2019-07-04', 'Las ratas de Hawkins se comportan de forma extraña y los chicos investigan.', 's3e2.jpg', 3);
INSERT INTO episodios (numero, titulo, duracion, fecha_emision, descripcion, imagen, temporada_id) VALUES
(1, 'El club Hellfire', 78, '2022-05-27', 'Un nuevo horror surge mientras los chicos se adaptan a la vida separada.', 's4e1.jpg', 4),
(2, 'La maldición de Vecna', 75, '2022-05-27', 'Un estudiante muere en circunstancias inquietantes y despiertan viejos terrores.', 's4e2.jpg', 4);
INSERT INTO episodios (numero, titulo, duracion, fecha_emision, descripcion, imagen, temporada_id) VALUES
(1, 'El principio del fin', 60, '2025-10-01', 'El grupo se reúne para enfrentar la amenaza final del Upside Down.', 's5e1.jpg', 5),
(2, 'Ecos del pasado', 62, '2025-10-08', 'Secretos antiguos resurgen mientras Hawkins se prepara para la batalla definitiva.', 's5e2.jpg', 5);