<?php
$hostname = "localhost";
$database = "ccss_bd";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    $error_conect = "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    $error_conect = false;
}

?>