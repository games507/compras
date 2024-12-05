<?php
include 'conexion.php'; // Incluir el archivo de conexión

// Inicializa variables
$uploadDir = 'uploads/'; // Asegúrate de que este directorio exista y tenga permisos de escritura
$uploadFiles = [];

// Manejo de archivos
if (isset($_FILES['pliego_cargos']) && $_FILES['pliego_cargos']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['pliego_cargos']['tmp_name'];
    $fileName = $_FILES['pliego_cargos']['name'];
    $filePath = $uploadDir . basename($fileName);

    // Mueve el archivo a la carpeta de destino
    if (move_uploaded_file($fileTmpPath, $filePath)) {
        $uploadFiles['pliego_cargos'] = $filePath; // Guarda la ruta del archivo
    }
}

if (isset($_FILES['aviso_convocatoria']) && $_FILES['aviso_convocatoria']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['aviso_convocatoria']['tmp_name'];
    $fileName = $_FILES['aviso_convocatoria']['name'];
    $filePath = $uploadDir . basename($fileName);

    // Mueve el archivo a la carpeta de destino
    if (move_uploaded_file($fileTmpPath, $filePath)) {
        $uploadFiles['aviso_convocatoria'] = $filePath; // Guarda la ruta del archivo
    }
}

// Ahora, puedes almacenar la información en la base de datos
$no_compra = $_POST['no_compra'];
$tipo_procedimiento = $_POST['tipo_procedimiento'];
$objeto_contractual = $_POST['objeto_contractual'];
$descripcion = $_POST['descripcion'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_presentacion = $_POST['fecha_presentacion'];
$fecha_apertura = $_POST['fecha_apertura'];
$lugar_presentacion = $_POST['lugar_presentacion'];
$termino_subsanacion = $_POST['termino_subsanacion'];
$precio_referencia = $_POST['precio_referencia'];
$estado = $_POST['estado'];
$acta_apertura = isset($_POST['acta_apertura']) ? $_POST['acta_apertura'] : '';
$resolucion_adjudicacion = isset($_POST['resolucion_adjudicacion']) ? $_POST['resolucion_adjudicacion'] : '';
$otros = isset($_POST['otros']) ? $_POST['otros'] : '';
$proponentes = isset($_POST['proponentes']) ? $_POST['proponentes'] : '';

// Obtén las rutas de los archivos cargados
$pliegoCargosPath = isset($uploadFiles['pliego_cargos']) ? $uploadFiles['pliego_cargos'] : '';
$avisoConvocatoriaPath = isset($uploadFiles['aviso_convocatoria']) ? $uploadFiles['aviso_convocatoria'] : '';

// Depuración: imprimir los valores a insertar
var_dump($no_compra, $tipo_procedimiento, $objeto_contractual, $descripcion, $fecha_publicacion, $fecha_presentacion, $fecha_apertura, $lugar_presentacion, $termino_subsanacion, $precio_referencia, $estado, $pliegoCargosPath, $avisoConvocatoriaPath, $acta_apertura, $resolucion_adjudicacion, $otros, $proponentes);

// Aquí es donde debes realizar la inserción en tu base de datos
$sql = "INSERT INTO wp_portalcompra (no_compra, tipo_procedimiento, objeto_contractual, descripcion, fecha_publicacion, fecha_presentacion, fecha_apertura, lugar_presentacion, termino_subsanacion, precio_referencia, estado, pliego_cargos, aviso_convocatoria, acta_apertura, resolucion_adjudicacion, otros, proponentes) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssss", $no_compra, $tipo_procedimiento, $objeto_contractual, $descripcion, $fecha_publicacion, $fecha_presentacion, $fecha_apertura, $lugar_presentacion, $termino_subsanacion, $precio_referencia, $estado, $pliegoCargosPath, $avisoConvocatoriaPath, $acta_apertura, $resolucion_adjudicacion, $otros, $proponentes);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Registro insertado con éxito";
} else {
    echo "Error al insertar el registro: " . $stmt->error; // Muestra el error
}

$stmt->close();
$conn->close();
?>
