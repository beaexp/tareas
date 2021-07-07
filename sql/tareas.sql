--@block Crear tabla para usuarios
--@conn Bitnami
CREATE TABLE tareas.tareas(
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    id_user INTEGER NOT NULL,
    descripcion TEXT,
    estado BOOLEAN NOT NULL,
    CONSTRAINT id_user_fk FOREIGN KEY(id_user) REFERENCES tareas.users(id)
)
