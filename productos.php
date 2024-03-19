<?php
include 'conectarbd.php'; // Incluir archivo de conexión a la base de datos

// Realizar consulta para obtener los productos con los nombres de los proveedores
$sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.stock, pr.nombre AS nombre_proveedor
        FROM producto p
        LEFT JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor";
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    $productos = array(); // Array para almacenar los productos

    // Iterar sobre los resultados y agregarlos al array de productos
    while($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }

    // Devolver los productos en formato JSON
    echo json_encode($productos);
} else {
    // Si no hay resultados, devolver un mensaje de error en formato JSON
    echo json_encode(array('error' => 'No se encontraron productos.'));
}

// Cerrar conexión a la base de datos
$conexion->close();
?>
