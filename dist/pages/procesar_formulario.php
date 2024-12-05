<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena

// Conexión a la base de datos
include 'conexion.php';

// Captura los datos enviados por el formulario
$no_compra = $_POST['no_compra'] ?? null;
$tipo_procedimiento = $_POST['tipo_procedimiento'] ?? null;
$objeto_contractual = $_POST['objeto_contractual'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$fecha_publicacion = $_POST['fecha_publicacion'] ?? null;
$fecha_presentacion = $_POST['fecha_presentacion'] ?? null;
$estado = $_POST['estado'] ?? null;

try {
    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO wp_portalcompra (no_compra, tipo_procedimiento, objeto_contractual, descripcion, fecha_publicacion, fecha_presentacion, estado)
            VALUES (:no_compra, :tipo_procedimiento, :objeto_contractual, :descripcion, :fecha_publicacion, :fecha_presentacion, :estado)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':no_compra' => $no_compra,
        ':tipo_procedimiento' => $tipo_procedimiento,
        ':objeto_contractual' => $objeto_contractual,
        ':descripcion' => $descripcion,
        ':fecha_publicacion' => $fecha_publicacion,
        ':fecha_presentacion' => $fecha_presentacion,
        ':estado' => $estado,
    ]);

    echo "Registro insertado con éxito";

} catch (PDOException $e) {
    // Mostrar el error
    echo "Error al guardar el registro: " . $e->getMessage();
}
?>
