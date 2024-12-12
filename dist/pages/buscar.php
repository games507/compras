<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
session_start(); // Inicia la sesión para poder acceder a $_SESSION

// Verifica si el usuario está logueado
$logueado = isset($_SESSION['usuario']);

include 'conexion.php'; // Conexión a la base de datos

// Inicializar variables
$searchTerm = '';
$resultsPerPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $resultsPerPage;

// Procesar búsqueda
if (!empty($_POST['searchTerm']) || !empty($_GET['searchTerm'])) {
    $searchTerm = !empty($_POST['searchTerm']) ? $_POST['searchTerm'] : $_GET['searchTerm'];
    $sql = "SELECT * FROM wp_portalcompra WHERE `no_compra` LIKE ? LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sii", $likeTerm, $offset, $resultsPerPage);
} else {
    $sql = "SELECT * FROM wp_portalcompra LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $resultsPerPage);
}

$stmt->execute();
$result = $stmt->get_result();
$records = $result->fetch_all(MYSQLI_ASSOC);

// Contar total de registros
if (!empty($searchTerm)) {
    // Si hay término de búsqueda, contar solo los registros que coinciden
    $countSql = "SELECT COUNT(*) FROM wp_portalcompra WHERE `no_compra` LIKE ?";
    $countStmt = $conn->prepare($countSql);
    $countStmt->bind_param("s", $likeTerm);
} else {
    // Si no hay búsqueda, contar todos los registros
    $countSql = "SELECT COUNT(*) FROM wp_portalcompra";
    $countStmt = $conn->prepare($countSql);
}

$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRecords = $countResult->fetch_row()[0];

// Calcular el total de páginas
$totalPages = max(ceil($totalRecords / $resultsPerPage), 1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Compras</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <?php include 'menu.php';?>

    <!-- Contenido principal -->
    <div class="">
        <div class="content-header">
            <div class="container-fluid">
                <h2 class="text-center">Búsqueda de Registros</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form method="POST" class="form-inline justify-content-center mb-3">
                    <input type="text" name="searchTerm" value="<?php echo htmlspecialchars($searchTerm); ?>" class="form-control mr-2" placeholder="Buscar No Compra Menor">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
                <?php if ($records): ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>No Compra Menor</th>
                            <th>Tipo de Procedimiento</th>
                            <th>Objeto Contractual</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($records as $record): ?>
    <tr>
        <td><?php echo htmlspecialchars($record['no_compra']); ?></td>
        <td>
            <?php 
                // Limitar a 50 caracteres y añadir "..." si es necesario
                echo htmlspecialchars(mb_strimwidth($record['tipo_procedimiento'], 0, 50, '...')); 
            ?>
        </td>
        <td><?php echo htmlspecialchars($record['objeto_contractual']); ?></td>
        <td>
    <a href="editar.php?id=<?php echo $record['id']; ?>" class="btn btn-info btn-sm">
        <i class="fas fa-edit"></i>
    </a>
    <!-- Botón de impresión -->
    <a href="tcpdf/reporte.php?id=<?php echo $record['id']; ?>" target="_blank" class="btn btn-success btn-sm">
        <i class="fas fa-print"></i>
    </a>
    <!-- Botón de subir archivo con ícono -->
    <a href="form/subir_doc.php?id_pcompra=<?php echo $record['id']; ?>" class="btn btn-warning btn-sm">
        <i class="fas fa-upload"></i>
    </a>
    <!-- Botón de agregar proponente -->
    <a href="proponentes.php?id_pcompra=<?php echo $record['id']; ?>" class="btn btn-primary btn-sm">
    <i class="fas fa-user" style="color: white;"></i>
</a>


</td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="alert alert-warning">No se encontraron registros.</div>
                <?php endif; ?>
                <!-- Paginación -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                            <a href="?page=<?php echo $i; ?>&searchTerm=<?php echo urlencode($searchTerm); ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>&copy; 2024 Portal Compras.</strong> Todos los derechos reservados.
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
