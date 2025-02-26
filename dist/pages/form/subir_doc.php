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
        //echo "Archivo subido con éxito: " . $pdfName . "<br>";

        // Insertar el registro en la base de datos con la ruta del archivo
        $stmt = $conn->prepare("INSERT INTO wp_docompra (id_pcompra, nombre, date, pdf) VALUES (?, ?, ?, ?)");
        $nombreDocumento = $_POST['nombre']; // Obtener el nombre del documento desde el formulario
        $fechaDocumento = $_POST['fecha']; // Obtener la fecha del formulario
        $stmt->bind_param("ssss", $id_pcompra, $nombreDocumento, $fechaDocumento, $pdfName);

        if ($stmt->execute()) {
            $successMessage = "Documento subido y guardado correctamente.";
        } else {
            echo 'alert("Error al guardar el documento en la base de datos")';
        }
    } else {
        echo 'alert("Error al mover el archivo: " . $pdfName .)';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir documento a la compra</title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="..\..\css\estilos-pc-asm.scss">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        background-color: #002d69;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px; /* Espaciado para pantallas pequeñas */
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: black;
        text-align: left;
    }

    .button {
        background-color: #002d69;
        color: white;
        text-decoration: none;
    }
    .button:hover {
        background-color: #d32f2f;
        transform: scale(1.05);
    }
    .popup-message {
        display: none;
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #009639;
        color: white;
        padding: 15px 30px;
        border-radius: 4px;
        font-size: 16px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: opacity 0.5s ease;
        z-index: 1000;
    }
    .popup-message.show {
        display: block;
        opacity: 1;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Subir documento a la compra</h2>
        <!-- Formulario para subir archivo -->
        <form method="POST" enctype="multipart/form-data" class="frm-edit-pc">
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
            <button style="background-color: #009639; color: white; margin-bottom: 20px;" type="submit" class="btn">Subir Documento</button>
        </form>

        <!-- Volver a la lista de compras -->
        <a href="https://compras.alcaldiasanmiguelito.gob.pa/dist/pages/buscar.php" style="background-color: #D50032; color: white;" class="btn">
        <i class="bi bi-arrow-left-circle-fill"></i>
            Volver a Lista de Compras
        </a>
      	<div id="popupMessage" class="popup-message">
            <?php echo $successMessage; ?>
        </div>
    </div>

    <!-- Scripts necesarios para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  	<script>
        document.addEventListener("DOMContentLoaded", function() {
            const popup = document.getElementById('popupMessage');
            if (popup.textContent.trim() !== "") {
                popup.classList.add('show');
                setTimeout(() => {
                    popup.classList.remove('show');
                }, 1000); // Ocultar después de 10 segundos
            }
        });
    </script>
</body>
</html>
