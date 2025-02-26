<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena

include 'conexion.php'; 

$logueado = isset($_SESSION['usuario']);
$message = ""; // Variable para el mensaje de notificación

// Verificar si el id_pcompra fue recibido por GET
if (isset($_GET['id_pcompra'])) {
    $id_pcompra = $_GET['id_pcompra'];
} else {
    $message = "<div class='alert alert-danger'>Error: No se ha recibido el ID de compra.</div>";
    exit();
}

// Procesar el formulario si fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario y sanitizarlos
    $proponente = $conn->real_escape_string($_POST['proponente']);
    $oferta = $conn->real_escape_string($_POST['oferta']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $aprobado = $_POST['aprobado'] ?? 'No'; // Obtener valor o 'No' por defecto

    // Insertar en la tabla wp_proponentes
    $stmt = $conn->prepare("INSERT INTO wp_proponentes (id_pcompra, proponente, oferta, hora, aprobado) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_pcompra, $proponente, $oferta, $hora, $aprobado);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Proponente registrado exitosamente.</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error al registrar el proponente: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proponente</title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050; /* Más alto que el menú lateral */
            width: auto;
        }
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
</head>
<body>
    <div class="container">
        <h2>Registrar proponente</h2>
        <!-- Mensaje -->
        <?php if (!empty($message)): ?>
            <div class="notification"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- Formulario -->
        <form method="POST" action="" class="frm-edit-pc">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="proponente" class="form-label">Proponente</label>
                        <input type="text" class="form-control" id="proponente" name="proponente" required>
                    </div>
                    <div class="mb-3">
                        <label for="oferta" class="form-label">Oferta</label>
                        <input type="number" min="10000" max="50000" step="0.01" class="form-control" id="oferta" name="oferta" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                    </div>
                    <div class="mb-3">
                        <label for="aprobado" class="form-label">Aprobado</label>
                        <select style="padding-top: 5px; padding-bottom: 5px;" class="form-control" id="aprobado" name="aprobado">
                            <option value="No">No</option>    
                            <option value="Si">Si</option>
                        </select>
                    </div>
                </div>
            </div>
            <button style="background-color: #009639; color: white; margin-bottom: 20px;" type="submit" class="btn">Guardar</button>
        </form>
        <a onClick="javascript:history.go(-1)" style="background-color: #D50032; color: white;" class="btn">
            <i class="bi bi-arrow-left-circle-fill"></i>
            Volver a Lista de Compras
        </a>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
