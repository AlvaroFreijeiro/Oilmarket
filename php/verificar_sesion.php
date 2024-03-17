<?php
session_start();
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
    echo "Bienvenido, $usuario";
} else {
    echo "No has iniciado sesión";
}
?>
