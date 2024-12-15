<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="registro.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" ><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" ><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="contraseña" ><br><br>

        <label for="confirmar_password">Confirmar Password:</label><br>
        <input type="password" id="confirmar_password" name="c_contraseña" ><br><br>

        <input type="submit" value="Registrar">
    </form><br>
    
    
<?php
session_start();
if (isset ($_SESSION['error'])){
    echo  $_SESSION['error'];
    unset ($_SESSION['error']);
}

// conexion
include("conBaseDatos.php");

// Construimos la consulta
$sql = "select * from usuarios";

// Ejecutamos y recogemos el resultado
$result = $conn->query($sql);


// si quiero saber el numero de registros encontrados
$row_count = $result->num_rows;

echo "<table border = 1>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th>password</th>";
echo "<th>fecha</th>";
echo "<th>Eliminar</th>";
echo "</tr>";
// Si quiero mostrarlos o recorrerlos
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "<td><a href ='borrar.php?id=" . $row['id'] . "'>Eliminar </a></td>";
    echo "</tr>";
}

echo "</table>";

// Cierro conexion
$conn->close();

echo "hay $row_count usuarios registrados";

?>


</body>
</html>
