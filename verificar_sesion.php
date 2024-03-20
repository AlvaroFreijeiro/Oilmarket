<?php
session_start();


// Verificar si el usuario ha iniciado sesión
$sesion_iniciada = isset($_SESSION['usuario']) && $_SESSION['usuario'];

// Devolver la respuesta como JSON
header('Content-Type: application/json');
echo json_encode(array('sesion_iniciada' => $sesion_iniciada));
?>

