<?php
session_start();

if (isset($_SESSION["id"])) {
    require_once 'db-connect.php';
    $db_connection = open_connection();

    $id = $_SESSION["id"];
    $result = pg_query("SELECT * FROM tareas.tareas WHERE id_user = $id;");
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
    <?php if (isset($_SESSION["username"])) { ?>
        Bienvenido/a <?php echo $_SESSION["username"]; ?> Para salir pulsa <a href="logout.php">Salir</a>
        <?php

        if (!$result) {
            echo "No tienes tareas, añade alguna";
        } else {
            echo "<ul>";
            while ($fila = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                echo "<li>";
                echo "<h4>" . $fila["nombre"] . "</h4>";
                echo "<p>" . $fila["descripcion"] . "</p>";
                echo "</li>\n";
            }
            echo "</ul>";
        }
        ?>
        <h2>Añade una nueva tarea</h2>
        <form action="nueva-tarea.php" method="post">
            <input type="text" name="nombre" id="">
            <input type="text" name="descripcion" id="">

            <input type="submit" value="actualizar">
        </form>

    <?php
        pg_free_result($result);
        pg_close();
    } else { ?>
        Para usar la lista de tareas <a href="login.php">accede</a> o <a href="signin.php">registrate</a>
    <?php } ?>
</body>

</html>