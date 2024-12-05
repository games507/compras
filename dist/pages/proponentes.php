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
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050; /* Más alto que el menú lateral */
            width: auto;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand -->
            <a href="#" class="brand-link">
                <i class="fas fa-shopping-cart ml-3"></i>
                <span class="brand-text font-weight-light">Portal Compras</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="registrar_proponente.php" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Registrar Proponente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="agregar_documento.php" class="nav-link">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>Agregar Documento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adjudicados.php" class="nav-link">
                                <i class="nav-icon fas fa-check-circle"></i>
                                <p>Adjudicados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cancelados.php" class="nav-link">
                                <i class="nav-icon fas fa-times-circle"></i>
                                <p>Cancelados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="vigente.php" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>Vigente</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Registrar Proponente</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <!-- Mensaje -->
                            <?php if (!empty($message)): ?>
                                <div class="notification"><?php echo $message; ?></div>
                            <?php endif; ?>

                            <!-- Formulario -->
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="proponente" class="form-label">Proponente</label>
                                            <input type="text" class="form-control" id="proponente" name="proponente" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="oferta" class="form-label">Oferta</label>
                                            <input type="text" class="form-control" id="oferta" name="oferta" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="hora" class="form-label">Hora</label>
                                            <input type="time" class="form-control" id="hora" name="hora" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="aprobado" class="form-label">Aprobado</label>
                                            <select class="form-control" id="aprobado" name="aprobado">
                                                <option value="No">No</option>    
                                                <option value="Sí">Sí</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
