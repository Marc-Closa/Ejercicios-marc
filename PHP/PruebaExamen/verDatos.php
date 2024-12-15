<?php
// conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "examen");

// construyo la consulta de ver los datos
$sql = "select * from usuarios";

// Ejecutamos y recogemos el resultado
$result = $conn->query($sql);

// si quiero saber el numero de registros encontrados
$row_count = $result->num_rows;


// Si quiero mostrarlos o recorrerlos

echo "<table border = 1>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>contraseña</th>";
echo "<th>email</th>";
echo "</tr>";


while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['contraseña'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";

}
echo "</table>";
?>