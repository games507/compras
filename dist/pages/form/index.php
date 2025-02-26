<?php
include '../conexion.php'; // Incluir la conexión a la base de datos

// Verificar si se pasó el id_pcompra
if (isset($_GET['id_pcompra'])) {
    $id_pcompra = $_GET['id_pcompra'];
} else {
    echo "Error: No se ha recibido el ID de compra.";
    exit();
}

// Insertar múltiples registros si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['items'])) {
    // Asegurarse de que la carpeta de subida existe
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Crea la carpeta si no existe
    }

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO wp_docompra (id_pcompra, nombre, date, pdf) VALUES (?, ?, ?, ?)");

    foreach ($_POST['items'] as $index => $item) {
        // Verificar que el formulario tiene valores válidos
        if (!empty($item['nombre']) && !empty($item['date']) && !empty($_FILES['pdf']['name'][$index])) {
            // Subir el archivo PDF
            $pdfName = basename($_FILES['pdf']['name'][$index]); // Obtener el nombre del archivo
            $targetFilePath = $targetDir . $pdfName; // Ruta completa del archivo

            // Verificar si el archivo se movió correctamente
            if (move_uploaded_file($_FILES['pdf']['tmp_name'][$index], $targetFilePath)) {
                echo "Archivo subido con éxito: " . $pdfName . "<br>"; // Mostrar el nombre del archivo subido

                // Ahora insertamos el registro en la base de datos con la ruta del archivo
                $stmt->bind_param('ssss', $id_pcompra, $item['nombre'], $item['date'], $pdfName);

                // Ejecutar la consulta y verificar si fue exitosa
                if ($stmt->execute()) {
                    echo "Documento " . $item['nombre'] . " guardado correctamente.<br>";
                } else {
                    echo "Error al guardar el documento " . $item['nombre'] . ".<br>";
                }
            } else {
                echo "Error al mover el archivo: " . $pdfName . "<br>";
            }
        } else {
            echo "Por favor complete todos los campos para el documento " . $item['nombre'] . ".<br>";
        }
    }
    // Mostrar mensaje de éxito al finalizar
    echo '<div class="alert alert-success" role="alert">¡Los documentos se han agregado correctamente!</div>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="..\..\css\estilos-pc-asm.scss">
    <title>Agregar documentos a la Compra</title>
</head>
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
        background-color: #002d69
        ;
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

<body>

<div class="container">
    <h2 style="margin-bottom: 40px;">Subir documento a la compra</h2>
    <form method="POST" class="frm-edit-pc" action="" enctype="multipart/form-data">
        <div id="itemContainer">
            <!-- Fila de entrada dinámica -->
            <div class="row mb-3" id="item0">
                <div class="col">
                    <input type="text" name="items[0][nombre]" class="form-control" placeholder="Nombre del Documento" required>
                </div>
                <div class="col">
                    <input type="date" name="items[0][date]" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col">
                    <input type="file" name="pdf[]" class="form-control" required>
                </div>
                <div class="col-auto">
                    <button type="button" style="background-color: #D50032; color: white;" class="btn" onclick="removeRow(0)">Eliminar</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn" style="background-color: #00A9E0; color: white; margin-bottom: 20px;" id="addRowBtn">Agregar Otro Documento</button>
        <button type="submit" style="background-color: #009639; color: white; margin-bottom: 20px;" class="btn">Guardar Documentos</button>
    </form>
    
    <!-- Botón Regresar -->
    <a href="../formulario_compra.php" class="btn btn-secondary mt-3">Regresar al Formulario</a>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript para agregar más filas dinámicamente
    let rowCount = 1;
    $('#addRowBtn').click(function() {
        let newRow = `
            <div class="row mb-3" id="item${rowCount}">
                <div class="col">
                    <input type="text" name="items[${rowCount}][nombre]" class="form-control" placeholder="Nombre del Documento" required>
                </div>
                <div class="col">
                    <input type="date" name="items[${rowCount}][date]" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col">
                    <input type="file" name="pdf[]" class="form-control" required>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn" style="background-color: #D50032; color: white;" onclick="removeRow(${rowCount})">Eliminar</button>
                </div>
            </div>
        `;
        $('#itemContainer').append(newRow);
        rowCount++;
    });

    // Función para eliminar una fila si está vacía
    function removeRow(rowId) {
        const row = $('#item' + rowId);
        const inputNombre = row.find('input[name="items[' + rowId + '][nombre]"]').val();
        const inputFecha = row.find('input[name="items[' + rowId + '][date]"]').val();

        if (inputNombre === "" && inputFecha === "") {
            row.remove();
        } else {
            alert('No se puede eliminar esta fila ya que contiene datos.');
        }
    }
</script>

</body>
</html>
