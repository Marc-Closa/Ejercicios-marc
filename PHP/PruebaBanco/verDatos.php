<?php
// Crear una conexión
include("conBaseDatos.php");

// Construimos la consulta
$sql = "select * from transacciones";

// Ejecutamos y recogemos el resultado
$result = $conn->query($sql);

// si quiero saber el numero de registros encontrados
$row_count = $result->num_rows;

echo "<table border = 1>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>nombre</th>";
// echo "<td></td>"
echo "</tr>";

// Si quiero mostrarlos o recorrerlos
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>"; 
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td><a href='borrar.php?id=" .  $row['id'] . "'>eliminar</a></td>";
    echo "</tr>";
}

// Cierro conexion
$conn->close();



?>