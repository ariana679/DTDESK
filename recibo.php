<?php

$carritoJson = $_GET['carrito'] ?? '[]';
$productos = json_decode($carritoJson, true);


$empresa = "DTDESK S.A.";
$direccion = "Direccion: Vergara e/24 y 27";
$telefono = "123-456-7890";
$fecha = date("d/m/Y");


$subtotal = 0;
foreach ($productos as $producto) {
    $subtotal += $producto["precio"] * $producto["cantidad"];
}
$impuesto = $subtotal * 0.21; 
$total = $subtotal + $impuesto;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin: 0;
        background-color: #f9f9f9;
    }
    .recibo {
        border: 1px solid #ddd;
        padding: 20px;
        margin-top: 20px;
        max-width: 100%;
        width: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .recibo h2 {
        margin: 0;
        font-size: 1.5em;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 8px;
        text-align: left;
        word-break: break-word;
    }
    .total {
        font-weight: bold;
    }
    .boton-imprimir {
        margin-top: 20px;
    }
    button {
        padding: 10px 20px;
        font-size: 1em;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
    }
    button:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>

    <div class="recibo">
        <h2><?php echo $empresa; ?></h2>
        <p><?php echo $direccion; ?></p>
        <p>Tel: <?php echo $telefono; ?></p>
        <p>Fecha: <?php echo $fecha; ?></p>
        <hr>

        <table>
            <tr>
                <th>Producto</th>
                <th>Cant.</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto["nombre"]); ?></td>
                <td><?php echo (int)$producto["cantidad"]; ?></td>
                <td><?php echo "$" . number_format($producto["precio"], 2); ?></td>
                <td><?php echo "$" . number_format($producto["precio"] * $producto["cantidad"], 2); ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" class="total">Subtotal</td>
                <td><?php echo "$" . number_format($subtotal, 2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="total">Impuesto (21  %)</td>
                <td><?php echo "$" . number_format($impuesto, 2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td><?php echo "$" . number_format($total, 2); ?></td>
            </tr>
        </table>
        <div class="boton-imprimir">
            <button onclick="window.print()">Imprimir Recibo</button>
        </div>
    </div>
    
</body>
</html>
