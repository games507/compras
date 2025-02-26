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
    $sql = "SELECT * FROM wp_portalcompra ORDER BY no_compra DESC WHERE `no_compra` LIKE ? LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sii", $likeTerm, $offset, $resultsPerPage);
} else {
    $sql = "SELECT * FROM wp_portalcompra ORDER BY no_compra DESC LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $resultsPerPage);
}

$stmt->execute();
$result = $stmt->get_result();
$records = $result->fetch_all(MYSQLI_ASSOC);

// Contar total de registros
if (!empty($searchTerm)) {
    // Si hay término de búsqueda, contar solo los registros que coinciden
    $countSql = "SELECT COUNT(*) FROM wp_portalcompra WHERE `no_compra` LIKE ? ORDER BY no_compra DESC";
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
    <!--Datos de la pestaña del navegador-->
    <title>Editar Compra | Portal de Compras</title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
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
    <main class="app-main">
    <!-- Contenido principal -->
    <div class="">
        <section>
            <div class="title-table-pc container-fluid text-center">
                <h2><b>Editar Compras</b></h2>
            </div>
        </section>
        <section class="content cont-pc">
            <div class="container-fluid"><div class="card"><div class="card-body">
                <form method="POST" action="" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-9 col-sm-8">
                        <input type="text" name="searchTerm" value="<?php echo htmlspecialchars($searchTerm); ?>" class="form-control mr-2" placeholder="Buscar No Compra Menor">
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <button class="btn btn-search-pc w-100" type="submit"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>
                <?php if ($records): ?>
                <div class="table-box-pc tb-pc-1">
                <table>
                    <thead class="thead-light">
                        <tr>
                            <th>No Compra Menor</th>
                            <th>Descripción</th>
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
                echo htmlspecialchars(mb_strimwidth($record['descripcion'], 0, 50, '...')); 
            ?>
        </td>
        <td><?php echo htmlspecialchars($record['objeto_contractual']); ?></td>
        <td>
    <a style="background-color: #002F6C;" href="editar.php?id=<?php echo $record['id']; ?>" class="btn btn-sm">
        <i class="fas fa-edit"></i>
    </a>
    <!-- Botón de impresión -->
    <a style="background-color: #0047BB;" href="tcpdf/reporte.php?id=<?php echo $record['id']; ?>" target="_blank" class="btn btn-sm">
    <i class="bi bi-printer"></i>
    </a>
    <!-- Botón de subir archivo con ícono -->
    <a style="background-color: #002F6C;" href="form/subir_doc.php?id_pcompra=<?php echo $record['id']; ?>" class="btn btn-sm">
    <i class="fas fa-file-upload"></i>
    </a>
    <!-- Botón de agregar proponente -->
    <a style="background-color: #0047BB;" href="proponentes.php?id_pcompra=<?php echo $record['id']; ?>" class="btn btn-sm">
    <i class="bi bi-building-add"></i>
</a>


</td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    </div>
                <?php else: ?>
                <div class="alert alert-warning">No se encontraron registros.</div>
                <?php endif; ?>
                <!-- Paginación -->
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>&searchTerm=<?php echo urlencode($searchTerm); ?>" aria-label="Anterior">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                            <a href="?page=<?php echo $i; ?>&searchTerm=<?php echo urlencode($searchTerm); ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>&searchTerm=<?php echo urlencode($searchTerm); ?>" aria-label="Siguiente">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div></div></div>
        </section>
    </div>

    <!-- Footer -->
    <footer style="padding: 16px; color: #002F6C;">
        <div class="float-right">
            <b>Version</b> 1.0
        </div>
        <strong>© 2024 Portal de Compras.</strong> Todos los derechos reservados.
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
