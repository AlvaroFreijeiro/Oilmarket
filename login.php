<?php

include 'conectarbd.php';

// Verificar si se enviaron datos de inicio de sesión
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuario WHERE nombre = '$usuario' AND contrasena = '$contrasena'";
    $resultado = $conexion->query($sql);

    // Verificar si hay coincidencias
    if ($resultado->num_rows > 0) {
        // Inicio de sesión exitoso, redirigir a la página principal
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["mensajeSesion"] = "Bienvenido $usuario";
        header("Location: ../index.html");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}

// Cerrar conexión a la base de datos
$conexion->close();
?>
