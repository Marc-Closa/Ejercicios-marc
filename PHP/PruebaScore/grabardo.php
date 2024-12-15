<?php

// comprobar que no esta vacios
if (!empty($_REQUEST["nombre"]) && !empty($_REQUEST["puntos"])){
   
    // recojer los parametros
    $nombre = $_REQUEST["nombre"];
    $puntos = $_REQUEST["puntos"];

     // si es mayor que 0 insertamos en la bbdd 
    if ($puntos > 0 ){

    // conectar a la bbdd
    include("conBaseDatos.php");

    // Construyo la consulta
    $sql = "INSERT INTO formulario (nombre, score, fecha) VALUES ('$nombre',$puntos,now())";
    
    // ejecuto la consulta
    $conn->query($sql);
    
    // Cierro la conexión
    $conn->close();

    session_start();
    $_SESSION["msg"] = "<h2>jugador insertado</h2>";
    header("location:index.php");


    // si es mayor que los inserte
    }else{
        session_start();
        $_SESSION["msg"] = "<h2>no puede ser negativo</h2>";
        header("location:index.php");
    }



}else {
        session_start();
        $_SESSION["msg"] = "<h2>los campos estan vacios</h2>";
        header("location:index.php");
    
}


?>