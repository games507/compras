<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
include 'conexion.php'; // Incluir el archivo de conexión

// Obtiene el número de compra de la solicitud
$no_compra = $_GET['no_compra'] ?? '';

// Preparar y ejecutar la consulta para obtener detalles
if ($no_compra) {
    $sql = "SELECT * FROM wp_portalcompra WHERE no_compra = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $no_compra);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(null);
    }

    $stmt->close();
}

$conn->close();
?>
