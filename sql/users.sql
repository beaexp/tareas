--@block Crear tabla para usuarios
--@conn Bitnami
CREATE SCHEMA tareas;
CREATE TABLE tareas.users(
    id SERIAL PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    pass VARCHAR(20) NOT NULL
);
