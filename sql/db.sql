DROP DATABASE IF EXISTS empresa;
CREATE DATABASE empresa;
USE empresa;

CREATE TABLE usuarios(
    user VARCHAR (50) PRIMARY KEY;
)engine=innodb;
