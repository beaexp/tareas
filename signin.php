<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if (count($_POST) == 0) { ?>
        <form action="signin.php" method="post">
            <input type="text" name="username" id="" placeholder="Nombre de usuario"><br>
            <input type="password" name="password" id="" placeholder="Contraseña"><br>
            <input type="submit" value="Registrarse">
        </form>
    <?php } else {
        require_once 'db-connect.php';
        $db_connection = open_connection();

        $username = $_POST["username"];
        $pass = $_POST["password"];
        $result = pg_query("INSERT INTO tareas.users(username, pass) VALUES ('$username','$pass');");

        if ($result) {
            echo "Registro completado con éxito";
        } else {
            echo "Error: " . pg_last_error();
        }
    }
    
    pg_free_result($result);
    pg_close($db_connection);
    ?>
</body>

</html>