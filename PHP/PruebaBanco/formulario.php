<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Sencillo</title>

</head>
<body>

    <h2>Formulario Sencillo</h2>
    <form action="validar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre" required>

        <label for="importe">Importe:</label>
        <input type="number" id="importe" name="importe" placeholder="Introduce el importe" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Selecciona una categoría</option>
            <option value="alimentos">Alimentos</option>
            <option value="ropa">Ropa</option>
            <option value="tecnologia">Tecnología</option>
            <option value="otros">Otros</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
<?php
session_start();
if (isset ($_SESSION["msg"])){
echo "<p>" . $_SESSION['msg'] . "</p>";
unset ($_SESSION["msg"]);
}
?>

<a href ="verDatos.php">Ver los datos</a>
    
</body>
</html>
