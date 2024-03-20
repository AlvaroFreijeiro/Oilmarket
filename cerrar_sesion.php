<?php

function cerrarSesion() {
    // Destruir todas las variables de sesión
    $_SESSION = array();
    
    // Si se desea eliminar la cookie de sesión, también se debe eliminar el identificador de sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Finalmente, destruir la sesión
    session_destroy();
}

// Llamar a la función para cerrar sesión
cerrarSesion();
// Cerrar conexión a la base de datos
$conexion->close();

// Redirigir a una página de inicio de sesión u otra página deseada
header("Location: ../login.html");
exit; // Asegúrate de salir del script después de redirigir
?>

