<?php 

function open_connection() {
    $db_config = array();
    $db_config["host"] = "localhost";
    $db_config["port"] = "5433";
    $db_config["dbname"] = "postgres";
    $db_config["user"] = "postgres";
    $db_config["password"] = "POSTGRES";

    $db_connection_string = "";

    foreach ($db_config as $key => $value) {
        $db_connection_string .= $key . "=" . $value . " ";
    }
    return pg_connect($db_connection_string) or die ("No se ha podido conectar con la base de datos: ". pg_last_error());
}
