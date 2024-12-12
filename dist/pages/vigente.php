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

include 'conexion.php'; // Incluir el archivo de conexión

// Variables para la búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Número de registros por página
$registros_por_pagina = 10;

// Verificar en qué página estamos
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) {
    $pagina_actual = 1;
}

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Condición para la búsqueda
// Ajuste aquí para que filtre solo los registros donde el estado sea 'adjudicado'
$where = !empty($busqueda) ? "WHERE (descripcion LIKE '%$busqueda%' OR estado LIKE '%$busqueda%') AND estado = 'vigente'" : "WHERE estado = 'vigente'";

// Contar el número total de registros
$sql_total = "SELECT COUNT(*) as total FROM wp_portalcompra $where";
$result_total = $conn->query($sql_total);
if ($result_total === false) {
    die("Error en la consulta total: " . $conn->error);
}
$total_registros = $result_total->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Consultar los datos para la página actual
$sql = "SELECT no_compra, descripcion, fecha_publicacion, estado 
        FROM wp_portalcompra 
        $where
        LIMIT $offset, $registros_por_pagina";
$result = $conn->query($sql);

// Verificar si la consulta se ejecutó correctamente
if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Compras</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <?php include 'menu.php';?>

        <!-- Content Wrapper -->
        <div class="">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Bienvenido al Portal de Compras</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <!-- Formulario de búsqueda -->
                            <form method="GET" action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar por descripción o número de compra" value="<?php echo htmlspecialchars($busqueda); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Tabla de resultados -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No Compra Menor</th>
                                        <th>Descripción</th>
                                        <th>Fecha de Publicación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['no_compra']); ?></td>
                                        <td>
                                            <?php
                                            $descripcion_corta = mb_substr($row['descripcion'], 0, 50);
                                            echo htmlspecialchars($descripcion_corta) . (strlen($row['descripcion']) > 50 ? '...' : '');
                                            ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['fecha_publicacion']); ?></td>
                                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                                        <td>
                                            <a class="btn btn-info" href="resultados.php?id=<?php echo urlencode($row['no_compra']); ?>"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                            <!-- Paginación -->
                            <div class="d-flex justify-content-center">
                                <nav>
                                    <ul class="pagination">
                                        <?php if ($pagina_actual > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>&busqueda=<?php echo urlencode($busqueda); ?>" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php else: ?>
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-hidden="true">&laquo;</span>
                                        </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                        <li class="page-item <?php echo $i == $pagina_actual ? 'active' : ''; ?>">
                                            <a class="page-link" href="?pagina=<?php echo $i; ?>&busqueda=<?php echo urlencode($busqueda); ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                        <?php endfor; ?>

                                        <?php if ($pagina_actual < $total_paginas): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>&busqueda=<?php echo urlencode($busqueda); ?>" aria-label="Siguiente">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php else: ?>
                                        <li class="page-item disabled">
                                            <span class="page-link" aria-hidden="true">&raquo;</span>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>&copy; 2024 Portal Compras.</strong>
