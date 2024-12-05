<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
include 'conexion.php';

$user_login = 'asantana'; // Cambia por el nombre de usuario
$password = '12345qwaszx**'; // Cambia por la contraseña en texto plano

// Encripta la contraseña antes de guardarla
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO wp_users (user_login, user_pass) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user_login, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario agregado exitosamente.";
} else {
    echo "Error al agregar usuario: " . $stmt->error;
}
?>
