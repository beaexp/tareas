<?php
session_start();
$user_id = $_SESSION["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$estado = 'FALSE';
require_once "db-connect.php";
$dbconn = open_connection();
$result = pg_query("INSERT INTO tareas.tareas(nombre, descripcion, estado, id_user) VALUES ('$nombre', '$descripcion', $estado, $user_id);");
if ($result) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Ha ocurrido un error: <?php echo "INSERT INTO tareas.tareas(nombre, descripcion, estado, id_user) VALUES ('$nombre', '$descripcion', $estado, $user_id);" ?>
</body>
</html>