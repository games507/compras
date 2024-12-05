<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión
header("Location: login.php"); // Redirige al login
exit();
