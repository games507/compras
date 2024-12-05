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
    <title>Editar Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #002d69;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 10px; /* Espaciado para pantallas pequeñas */
    }
    .container {
        background: #fff;
        padding: 20px;
        width: 100%;
        max-width: 500px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    h2 {
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
        text-align: left;
    }
    form input[type="text"],
    form input[type="date"],
    form input[type="datetime-local"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }
    .button-container {
        display: flex;
        flex-wrap: wrap; /* Para que se ajusten en pantallas pequeñas */
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }
    button, .button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
        width: calc(50% - 10px); /* Botones más pequeños en móviles */
    }
    button {
        background-color: #002d69
        ;
        color: white;
    }
    button:hover {
        background-color: #002d69;
        transform: scale(1.05);
    }
    .button {
        background-color: #002d69
        ;
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


</head>
<body>
    <div class="container">
        <h2>Editar Registro</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
            
            <label>No Compra Menor:</label>
            <input type="text" name="no_compra" value="<?php echo htmlspecialchars($record['no_compra']); ?>" required>

            <label>Tipo de procedimiento:</label>
            <input type="text" name="tipo_procedimiento" value="<?php echo htmlspecialchars($record['tipo_procedimiento']); ?>" required>

            <label>Objeto Contractual:</label>
            <input type="text" name="objeto_contractual" value="<?php echo htmlspecialchars($record['objeto_contractual']); ?>" required>

            <label>Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo htmlspecialchars($record['descripcion']); ?>" required>

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
            <input type="text" name="precio_referencia" value="<?php echo htmlspecialchars($record['precio_referencia']); ?>" required>

            <label>Estado:</label>
<select name="estado" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;">
    <option value="Vigente" <?php echo $record['estado'] === 'Vigente' ? 'selected' : ''; ?>>Vigente</option>
    <option value="Adjudicado" <?php echo $record['estado'] === 'Adjudicado' ? 'selected' : ''; ?>>Adjudicado</option>
    <option value="Cancelado" <?php echo $record['estado'] === 'Cancelado' ? 'selected' : ''; ?>>Cancelado</option>
    <option value="Desierto" <?php echo $record['estado'] === 'Desierto' ? 'selected' : ''; ?>>Desierto</option>
</select>



                        <button type="submit" style="background-color: #4CAF50; color: white; padding: 5px 5px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease, transform 0.1s ease;">
                Guardar cambios
            </button>
            <a href="index.php" class="button" style="background-color: #f44336; color: white; padding: 5px 5px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none; margin-left: 10px; transition: background-color 0.3s ease, transform 0.1s ease;">
                Cancelar
            </a>

        </form>
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
                }, 3000); // Ocultar después de 30 segundos
            }
        });
    </script>
</body>
</html>
