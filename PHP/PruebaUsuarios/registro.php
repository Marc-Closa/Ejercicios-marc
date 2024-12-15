<?php

// comprobamos que nos vienen todos los parametros y no están vacios
if ( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["email"]) && !empty($_REQUEST["contraseña"]) && !empty($_REQUEST["c_contraseña"])){
  
    // recojemos en una variable los parametros que nos han venido
    $nombre = $_REQUEST["nombre"];
    $email = $_REQUEST["email"];
    $contraseña = $_REQUEST["contraseña"];
    $c_contraseña = $_REQUEST["c_contraseña"];

    if (strlen($nombre) > 2 && $contraseña == $c_contraseña){
        $n = ucfirst($nombre);
        $e = strtolower($email);
        
        // conn base de datos
        include("conBaseDatos.php");

        // Construyo la consulta
        $sql = "insert into usuarios (nombre, email, password, fecha) 
        values ('$n', '$e', '$contraseña', now())";
        // ejecuto la consulta
        $conn->query($sql);
        // Cierro la conexión
        $conn->close();

        echo "se ha creado el usuario correctamente";

        

    }else{
        session_start();
        $_SESSION["error"] = "el usuario tiene que tener mas de 2 caracteres o pon bien la contraseña";
        header("location:index.php");
}
}else{
    session_start();
    $_SESSION["error"] = "tienes que completar todos los campos";
    header("location:index.php");
}


?>