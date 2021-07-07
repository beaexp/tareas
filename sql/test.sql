--@block Crear tabla para usuarios
--@conn Bitnami
INSERT INTO tareas.users(username, pass) VALUES ('marce','1234');

--@block Crear tabla para usuarios
--@conn Bitnami
SELECT * FROM tareas.users WHERE username = 'blog'  AND pass = '1234';

--@block Insertar tarea
--@conn Bitnami
INSERT INTO tareas.tareas(nombre, descripcion, estado, id_user) VALUES ('zxcv', 'zxcv', FALSE, 2) ;