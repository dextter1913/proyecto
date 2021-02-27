DROP TABLE  if EXISTS empleados;
DROP TABLE if EXISTS usuarios;
CREATE TABLE usuarios(
    user VARCHAR (50) PRIMARY KEY NOT NULL,
    pass VARCHAR (50) NOT NULL
)engine=innodb;


CREATE TABLE empleados(
    id VARCHAR (20) PRIMARY KEY NOT NULL ,
    nombre VARCHAR (50) NOT NULL,
    apellido VARCHAR (50) NOT NULL,
    telefono VARCHAR (20) NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    correo VARCHAR (50) NOT NULL,
    user VARCHAR (50) NOT NULL,
    index(user),
    FOREIGN KEY (user) REFERENCES usuarios (user),
    UNIQUE (correo)
)engine=innodb;