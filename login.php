<?php
session_start();
$message = "";
if (count($_POST) > 0) {
    require_once 'db-connect.php';
    $db_connection = open_connection();

    $username = $_POST["username"];
    $pass = $_POST["password"];
    $result = pg_query("SELECT * FROM tareas.users WHERE username = '$username'  AND pass = '$pass';");

    if ($result) {
        $fila = pg_fetch_array($result, null, PGSQL_ASSOC);
        if($fila) {
            $_SESSION["id"] = $fila["id"];
            $_SESSION["username"] = $fila["username"];
        }
        else {
            $message = "Nombre de usuario o password aqui pasa algo" . $fila . "<br>" . "SELECT * FROM tareas.users WHERE username = '$username'  AND pass = '$pass';";
        }
    } else {
        $message = "Nombre de usuario o password incorrectos" . $result;
    }
    pg_free_result($result);
    pg_close();
    if (isset($_SESSION["id"])) {
        header("Location: index.php");
    }
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
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <form action="login.php" method="post">
        <input type="text" name="username" id="" placeholder="Nombre de usuario"><br>
        <input type="password" name="password" id="" placeholder="Contraseña"><br>
        <input type="submit" value="Acceder">
    </form>
</body>

</html>
