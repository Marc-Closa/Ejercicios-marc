<?php

if( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["importe"]) && !empty($_REQUEST["categoria"])) {
$nombre = $_REQUEST["nombre"];
$importe = $_REQUEST["importe"];
$categoria = $_REQUEST["categoria"];
}else 
echo "faltan datos"
;

// nombre entre 3 y 30 caracteres
if (strlen($nombre) >= 3 && strlen($nombre) <= 30){
    echo "<p>longitud de nombre correcta";

}else {
session_start();
$_SESSION["msg"] = "el nombre tiene que ser entre 3 y 30 caracteres";
header("location:formulario.php");
}


// importe entre -10 y +10
if ($importe >= -10 && $importe <= +10){
    echo "<p>importe correcto";
}
else{
session_start();
$_SESSION["msg"] = "el importe tiene que ser entre -10 y +10";
header("Location:formulario.php");
}


// categoria en mayusculas
echo "<p>la categoria es "; 
echo strtoupper($categoria);
echo "<p>el nombre es "; 
echo ucfirst($nombre);



// conectar a bbdd
include("conBaseDatos.php");

// Construyo la consulta
$sql = "insert into transacciones (nombre, importe, categoria, fecha) 
values ('$nombre', '$importe', '$categoria', now())";

// ejecuto la consulta
$conn->query($sql);

// Cierro la conexión
$conn->close();

echo "<p>se ha insertado el usuario";

?>
