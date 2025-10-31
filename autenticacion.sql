CREATE DATABASE IF NOT EXISTS autenticacion_tp5;

CREATE TABLE rol (
    idRol INT AUTO_INCREMENT PRIMARY KEY,
    descripcionRol VARCHAR(100) NOT NULL
);

CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombreUsuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    activo TINYINT(1) DEFAULT 1,
    idRol INT DEFAULT NULL,
    FOREIGN KEY (idRol) REFERENCES rol(idRol)
        ON UPDATE CASCADE ON DELETE SET NULL
);


CREATE TABLE usuariorol (
    idUsuarioRol INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT NOT NULL,
    idRol INT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idRol) REFERENCES rol(idRol)
        ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE KEY (idUsuario, idRol) -- evita duplicados
);



-- DATOS INICIALES (pa probar)
INSERT INTO rol (descripcionRol) VALUES
('Administrador'),
('Usuario'),
('Invitado');

INSERT INTO usuario (nombreUsuario, password, nombre, apellido, email, activo, idRol)
VALUES
('admin', 'admin123', 'Admin', 'Principal', 'admin@gmail.com', 1, 1),
('marcos', '12345', 'Marcos', 'Chavez', 'marcos@gmail.com', 1, 2);

INSERT INTO usuariorol (idUsuario, idRol) VALUES
(1, 1),
(2, 2);
