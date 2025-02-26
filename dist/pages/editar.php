<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include 'conexion.php'; // Incluir el archivo de conexión
$successMessage = "";

// Obtener el ID del registro a editar
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consultar el registro actual para rellenar el formulario
$query = "SELECT * FROM wp_portalcompra WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valores del formulario
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $no_compra = $_POST['no_compra'] ?? '';
    $tipo_procedimiento = $_POST['tipo_procedimiento'] ?? '';
    $objeto_contractual = $_POST['objeto_contractual'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $fecha_publicacion = $_POST['fecha_publicacion'] ?? '';
    $fecha_presentacion = $_POST['fecha_presentacion'] ?? '';
    $fecha_apertura = $_POST['fecha_apertura'] ?? '';
    $lugar_presentacion = $_POST['lugar_presentacion'] ?? '';
    $termino_subsanacion = $_POST['termino_subsanacion'] ?? '';
    $precio_referencia = $_POST['precio_referencia'] ?? '';
    $estado = $_POST['estado'] ?? '';

    // Actualización segura de los datos
    $sql = "UPDATE wp_portalcompra SET 
                no_compra = ?, 
                tipo_procedimiento = ?, 
                objeto_contractual = ?, 
                descripcion = ?, 
                fecha_publicacion = ?, 
                fecha_presentacion = ?, 
                fecha_apertura = ?, 
                lugar_presentacion = ?, 
                termino_subsanacion = ?, 
                precio_referencia = ?, 
                estado = ? 
            WHERE id = ?";

    // Preparar y ejecutar la sentencia
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssi", $no_compra, $tipo_procedimiento, $objeto_contractual, $descripcion, $fecha_publicacion, $fecha_presentacion, $fecha_apertura, $lugar_presentacion, $termino_subsanacion, $precio_referencia, $estado, $id);

    if ($stmt->execute()) {
        $successMessage = "Registro actualizado con éxito.";
    } else {
        echo "<p>Error al actualizar el registro: " . htmlspecialchars($stmt->error) . "</p>";
    }
}
?>

<!-- HTML del formulario sigue aquí -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro | <?php echo htmlspecialchars($record['no_compra']); ?></title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <link rel="stylesheet" href="https://tabler.io/tabler/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">

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
    <div class="container" style="margin-right: 30px !important; margin-left: 30px !important;">
        <h2>Editar Registro</h2>
        <form method="POST" class="frm-edit-pc">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
            
            <label>No Compra Menor:</label>
            <input type="text" name="no_compra" value="<?php echo htmlspecialchars($record['no_compra']); ?>" required>

            <label>Tipo de procedimiento:</label>
            <textarea style="width:100%;" name="tipo_procedimiento" required><?php echo htmlspecialchars($record['tipo_procedimiento']); ?></textarea>

            <label>Objeto Contractual:</label>
            <input type="text" name="objeto_contractual" value="<?php echo htmlspecialchars($record['objeto_contractual']); ?>" required>

            <label>Descripción:</label>
            <textarea type="text" name="descripcion" required><?php echo htmlspecialchars($record['descripcion']); ?></textarea>

            <label>Fecha de publicación:</label>
            <input type="date" name="fecha_publicacion" value="<?php echo htmlspecialchars($record['fecha_publicacion']); ?>" required>

            <label>Fecha y hora de presentación de propuesta:</label>
            <input type="datetime-local" name="fecha_presentacion" value="<?php echo htmlspecialchars($record['fecha_presentacion']); ?>" required>

            <label>Fecha y hora de apertura de propuesta:</label>
            <input type="datetime-local" name="fecha_apertura" value="<?php echo htmlspecialchars($record['fecha_apertura']); ?>" required>

            <label>Lugar de presentación de propuesta:</label>
            <input type="text" name="lugar_presentacion" value="<?php echo htmlspecialchars($record['lugar_presentacion']); ?>" required>

            <label>Término de subsanación:</label>
            <input type="text" name="termino_subsanacion" value="<?php echo htmlspecialchars($record['termino_subsanacion']); ?>" required>

            <label>Precio de referencia:</label>
            <input type="number" min="10000" max="50000" step="0.01" id="precio_referencia" name="precio_referencia" value="<?php echo htmlspecialchars($record['precio_referencia']); ?>" oninput="limitDecimals(this)" required>
            <script>
                function limitDecimals(input) {
                    var value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        input.value = value.toFixed(2);
                    }
                }
            </script>

            <label>Estado:</label>
            <select name="estado" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
                <option value="Vigente" <?php echo $record['estado'] === 'Vigente' ? 'selected' : ''; ?>>Vigente</option>
                <option value="Adjudicado" <?php echo $record['estado'] === 'Adjudicado' ? 'selected' : ''; ?>>Adjudicado</option>
                <option value="Cancelado" <?php echo $record['estado'] === 'Cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                <option value="Desierto" <?php echo $record['estado'] === 'Desierto' ? 'selected' : ''; ?>>Desierto</option>
            </select>

            <button style="background-color: #009639; color: white; margin-bottom: 20px;" type="submit" class="btn"><i class="bi bi-check-circle-fill"></i>  Guardar cambios</button>
        
        </form>
        <a onClick="javascript:history.go(-1)" style="background-color: #D50032; color: white;" class="btn">
            <i class="bi bi-x-circle-fill"></i>
                Cancelar
            </a>
        <div id="popupMessage" class="popup-message">
            <?php echo $successMessage; ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popup = document.getElementById('popupMessage');
            if (popup.textContent.trim() !== "") {
                popup.classList.add('show');
                setTimeout(() => {
                    popup.classList.remove('show');
                    history.go(-2);
                }, 2000); // Ocultar después de 30 segundos
            }
        });
    </script>
</body>
</html>
