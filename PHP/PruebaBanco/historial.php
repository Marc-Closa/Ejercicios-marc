<?php
// Incluir la conexión a la base de datos
include("conBaseDatos.php");

// Consultar todos los movimientos
$sql = "SELECT id, nombre, importe, categoria FROM transacciones";
$result = $conn->query($sql);

// Inicializar variables para estadísticas
$totalMovimientos = 0;
$totalIngresos = 0;
$totalGastos = 0;

// Procesar los resultados
$movimientos = [];
while ($row = $result->fetch_assoc()) {
    $movimientos[] = $row;
    $totalMovimientos++;
    if ($row['importe'] > 0) {
        $totalIngresos += $row['importe'];
    } else {
        $totalGastos += $row['importe'];
    }
}

// Calcular el importe restante
$importeRestante = $totalIngresos + $totalGastos;

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Movimientos</title>
</head>
<body>
    <h1>Listado de Movimientos</h1>
    
    <!-- Mostrar estadísticas -->
    <p>Total de movimientos: <?php echo $totalMovimientos; ?></p>
    <p>Total de ingresos: <?php echo number_format($totalIngresos, 2); ?></p>
    <p>Total de gastos: <?php echo number_format(abs($totalGastos), 2); ?></p>
    <p>Importe restante: <?php echo number_format($importeRestante, 2); ?></p>

    <!-- Mostrar tabla de movimientos -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Concepto</th>
                <th>Importe</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($movimientos) > 0): ?>
                <?php foreach ($movimientos as $movimiento): ?>
                    <tr>
                        <td><?php echo $movimiento['id']; ?></td>
                        <td><?php echo htmlspecialchars($movimiento['nombre']); ?></td>
                        <td><?php echo number_format($movimiento['importe'], 2); ?></td>
                        <td><?php echo htmlspecialchars($movimiento['categoria']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay movimientos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
