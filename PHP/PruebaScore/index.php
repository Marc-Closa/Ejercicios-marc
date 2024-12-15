<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario</h1>

    <?php
    session_start();
    if (isset($_SESSION["msg"])){
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
    ?>

    <form action="grabardo.php" method="post">
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="nombre" ><br><br>

        <label for="score">Puntos:</label><br>
        <input type="number" id="score" name="puntos" ><br><br>

        <button type="submit">Enviar</button>
    </form>
  
    
<?php
// Crear una conexión
include("conBaseDatos.php");

// Construimos la consulta
$sql = "select * from formulario";

// Ejecutamos y recogemos el resultado
$result = $conn->query($sql);


// si quiero saber el numero de registros encontrados
$row_count = $result->num_rows;


echo "<table border = 1>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>Nombre</th>";
echo "<th>Eliminar</th>";
echo "</tr>";

// Si quiero mostrarlos o recorrerlos
while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td><a href='borrar.php?id=" . $row['id'] . "'>Eliminar</a></td>";
    echo "<td><a href='borrar.php?id=" . $row['id'] . "'>eliminar</a></td>";  
    echo "</tr>";
}

echo "</table>";
// Cierro conexion

$conn->close();


?>


</body>
</html>
