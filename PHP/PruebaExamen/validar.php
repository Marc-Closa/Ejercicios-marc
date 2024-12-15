<?php
// validar los datos
if ( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["contraseña"]) ){

// recojerlos
$nombre = $_REQUEST["nombre"];
$contraseña = $_REQUEST["contraseña"];
$email = "$nombre" . "$contraseña" . "@gmail.com";


// conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "examen");

// construyo la consulta de insertar datos
$sql = "INSERT into usuarios (nombre, contraseña, email) values ('$nombre', '$contraseña', '$email')";

// ejecuto la consulta
$conn->query($sql);

// Cierro la conexión
$conn->close();

echo "se ha insertado el usuario<br>";


}else 
    echo "faltan datos"


?>