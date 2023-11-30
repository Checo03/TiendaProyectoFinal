CREATE TABLE proy.usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    cuenta VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    pregunta VARCHAR(255) NOT NULL,
    respuesta VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin INT NOT NULL DEFAULT 0,
    bloq INT NOT NULL DEFAULT 0
);

