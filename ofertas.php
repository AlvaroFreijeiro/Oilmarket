<?php
include "conectarbd.php";


// Validar y escapar el parámetro GET searchTerm
$searchTerm = isset($_GET['searchTerm']) ? mysqli_real_escape_string($conexion, $_GET['searchTerm']) : '';

echo $searchTerm;
// Verificar si se proporcionó un término de búsqueda válido
if (!empty($searchTerm)) {
// Consulta SQL para buscar productos en la base de datos
$sql = "SELECT * FROM producto p INNER JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor WHERE p.nombre LIKE '%$searchTerm%'";

// Ejecutar la consulta
$resultados = $conexion->query($sql);


$productos = array();

// Verificar si hay resultados
if ($resultados->num_rows > 0) {
    // Iterar sobre los resultados y agregarlos al array
    while ($row = $resultados->fetch_assoc()) {
        $productos[] = $row;
    }
} else {
    // Si no hay resultados, devolver un array vacío
    $productos = array();
}

// Cerrar la conexión a la base de datos
$conexion->close();
}
// Devolver los resultados como JSON
echo json_encode($productos);
?>
