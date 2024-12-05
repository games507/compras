<?php
include '../conexion.php'; // Conexión a la base de datos

// Verificar si se pasó el id_pcompra
if (isset($_GET['id_pcompra'])) {
    $id_pcompra = $_GET['id_pcompra'];
} else {
    echo "Error: No se ha recibido el ID de compra.";
    exit();
}

// Procesar formulario de subida de archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    // Asegurarse de que la carpeta de subida exista
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Crea la carpeta si no existe
    }

    // Obtener el nombre del archivo y la ruta completa donde se guardará
    $pdfName = basename($_FILES['pdf']['name']); 
    $targetFilePath = $targetDir . $pdfName; 

    // Verificar si el archivo se movió correctamente
    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFilePath)) {
        echo "Archivo subido con éxito: " . $pdfName . "<br>";

        // Insertar el registro en la base de datos con la ruta del archivo
        $stmt = $conn->prepare("INSERT INTO wp_docompra (id_pcompra, nombre, date, pdf) VALUES (?, ?, ?, ?)");
        $nombreDocumento = $_POST['nombre']; // Obtener el nombre del documento desde el formulario
        $fechaDocumento = $_POST['fecha']; // Obtener la fecha del formulario
        $stmt->bind_param("ssss", $id_pcompra, $nombreDocumento, $fechaDocumento, $pdfName);

        if ($stmt->execute()) {
            echo "Documento subido y guardado correctamente.<br>";
        } else {
            echo "Error al guardar el documento en la base de datos.<br>";
        }
    } else {
        echo "Error al mover el archivo: " . $pdfName . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documento para la Compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Subir Documento para la Compra</h2>
        
        <!-- Formulario para subir archivo -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Documento</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="pdf" class="form-label">Seleccionar archivo PDF</label>
                <input type="file" class="form-control" name="pdf" required>
            </div>
            <button type="submit" class="btn btn-success">Subir Documento</button>
        </form>

        <!-- Volver a la lista de compras -->
        <a href="../buscar.php" class="btn btn-secondary mt-3">Volver a la lista de compras</a>
    </div>

    <!-- Scripts necesarios para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
