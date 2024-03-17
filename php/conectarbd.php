<?php
$host = "localhost"; 
$usuario = "root";
$contrasena = "12345";
$base_datos = "oilmarket";
$port=3306;

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Ahora puedes usar $conexion para realizar consultas y operaciones en la base de datos

// Ejemplo de consulta
$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);

// Manejo de resultados
//if ($resultado->num_rows > 0) {
  //  while($fila = $resultado->fetch_assoc()) {
    //    var_dump($fila);
    //    echo "Campo1: " . $fila["campo1"]. " - Campo2: " . $fila["campo2"]. "<br>";
    //}
//} else {
 //   echo "0 resultados";
//}

// Cerrar conexión
//$conexion->close();
?>
