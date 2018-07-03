<?php
/*Este script se encargar de la conexion
con la Base de Datos */

$hostname = "localhost";//Direccion del servidor de BD
$database = "bd_misitio"; // El nombre de la BD
$username = "root"; //Es usuario de la BD
$contrasena = ""; //Contraseña root  

//Se establece la conexion
$BD = new mysqli($hostname,$username,$contrasena,$database);

//Se valida que la conexcion se haya realizado
//correctamente
if($BD->connect_errno){
    $error_conect = "Falló la conexion (". $BD->connect_errno . ")".$BD->connect_errno;
}  else {
    $error_conect = false;
}
?>