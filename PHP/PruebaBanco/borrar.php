<?php
// Crear una conexión
include("conBaseDatos.php");

$id = $_REQUEST["id"];

// Construyo la consulta
$sql = "delete from transacciones where id = $id";

// ejecuto la consulta
$conn->query($sql);

// Cierro la conexión
$conn->close();

session_start();
$_SESSION["msg"] = "eliminado el id $id";
header("location:formulario.php");

?>