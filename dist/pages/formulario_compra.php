<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena

// Iniciar sesión para acceder al usuario logueado
session_start();
header('Content-Type: text/html; charset=utf-8');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redirige al login si no está autenticado
    exit();
}

// Usuario logueado
$usuario_registrado = $_SESSION['usuario'];

// Conexión a la base de datos
include 'conexion.php';


try {
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	$pdo->exec("SET NAMES utf8mb4"); // Forzamos la codificación UTF-8 auct. 20_2_25
}catch (PDOException $e) {
    die("(catch)Error de conexión: " . $e->getMessage());
}

// Captura los datos enviados por el formulario
//$id = $_POST['id'] ?? null;
$no_compra = $_POST['no_compra'] ?? null;
$tipo_procedimiento = $_POST['tipo_procedimiento'] ?? null;
$objeto_contractual = $_POST['objeto_contractual'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$fecha_publicacion = $_POST['fecha_publicacion'] ?? null;
$fecha_presentacion = $_POST['fecha_presentacion'] ?? null;
$fecha_apertura = $_POST['fecha_apertura'] ?? null;
$lugar_presentacion = $_POST['lugar_presentacion'] ?? null;
$termino_subsanacion = $_POST['termino_subsanacion'] ?? null;
$precio_referencia = $_POST['precio_referencia'] ?? null;
$estado = $_POST['estado'] ?? null;
$partida_presupuestaria = $_POST['partida_presupuestaria'] ?? null;
$modalidad_adjudicacion = $_POST['modalidad_adjudicacion'] ?? null;
$provincia_entrega = $_POST['provincia_entrega'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Consulta SQL para insertar los datos en wp_portalcompra
        $sql = "INSERT INTO wp_portalcompra (
                    no_compra, tipo_procedimiento, objeto_contractual, descripcion, 
                    fecha_publicacion, fecha_presentacion, fecha_apertura, lugar_presentacion, 
                    termino_subsanacion, precio_referencia, estado, partida_presupuestaria, 
                    modalidad_adjudicacion, provincia_entrega, usuario_registrado
                ) VALUES (
                    :no_compra, :tipo_procedimiento, :objeto_contractual, :descripcion, 
                    :fecha_publicacion, :fecha_presentacion, :fecha_apertura, :lugar_presentacion, 
                    :termino_subsanacion, :precio_referencia, :estado, :partida_presupuestaria, 
                    :modalidad_adjudicacion, :provincia_entrega, :usuario_registrado
                )";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta con los parámetros
        $stmt->execute([
            ':no_compra' => $no_compra,
            ':tipo_procedimiento' => $tipo_procedimiento,
            ':objeto_contractual' => $objeto_contractual,
            ':descripcion' => $descripcion,
            ':fecha_publicacion' => $fecha_publicacion,
            ':fecha_presentacion' => $fecha_presentacion,
            ':fecha_apertura' => $fecha_apertura,
            ':lugar_presentacion' => $lugar_presentacion,
            ':termino_subsanacion' => $termino_subsanacion,
            ':precio_referencia' => $precio_referencia,
            ':estado' => $estado,
            ':partida_presupuestaria' => $partida_presupuestaria,
            ':modalidad_adjudicacion' => $modalidad_adjudicacion,
            ':provincia_entrega' => $provincia_entrega,
            ':usuario_registrado' => $usuario_registrado,
        ]);

        // Obtener el ID de la compra insertada
        $id_pcompra = $pdo->lastInsertId();

        // Redirigir al formulario de documentos con el ID de la compra
        header("Location: form/index.php?id_pcompra=$id_pcompra");
        exit();

    } catch (PDOException $e) {
        // Mostrar el error
        echo "Error al guardar el registro: " . $e->getMessage();
    }
}
?>
