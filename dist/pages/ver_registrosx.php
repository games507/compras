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
$where = !empty($busqueda) ? "WHERE descripcion LIKE '%$busqueda%' OR no_compra LIKE '%$busqueda%'" : '';

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
        ORDER BY no_compra DESC
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
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <style>
    /* Cambiar el fondo de la barra lateral a #002d69 */
    .main-sidebar {
        background-color: #002d69 !important;
    }

    /* Cambiar las letras de los enlaces de la barra lateral a blanco */
    .main-sidebar .nav-link {
        color: white !important;
    }

    /* Cambiar el color de los íconos a blanco */
    .main-sidebar .nav-icon {
        color: white !important;
    }

    /* Cambiar el color de los íconos cuando se pasa el mouse */
    .main-sidebar .nav-link:hover .nav-icon {
        color: #f8f9fa !important;  /* Puedes cambiar el color de los íconos en hover si lo deseas */
    }

    /* Cambiar el color de los enlaces cuando se pasa el mouse */
    .main-sidebar .nav-link:hover {
        background-color: #001f4d !important; /* Puedes cambiar el fondo en hover si lo deseas */
        color: #f8f9fa !important;  /* Cambiar el color del texto al pasar el mouse */
    }
    .font-style-title {
      font-family: 'Nunito', sans-serif !important;
    }
    .font-style-subtitle {
      font-family: 'Nunito', sans-serif !important;
    }
    .font-style-heading {
      font-family: 'Nunito', sans-serif !important;
    }
    .font-style-normalText {
      font-family: 'Nunito', sans-serif !important;
    }
    .btn-primary {
        background-color: #002d69 !important; 
        
        color: white !important; /* Texto blanco */
    }
    .btn-info{
        background-color: #002d69 !important; 
        
        color: white !important; /* Texto blanco */
    }
    .pagination .page-link {
        background-color: #002d69; /* Fondo del botón */
        color: white; /* Color del texto */
        border: 1px solid #002d69; /* Color del borde */
    }

    .pagination .page-link:hover {
        background-color: #001f4d; /* Fondo en hover */
        color: white; /* Color del texto en hover */
    }

    .pagination .page-item.active .page-link {
        background-color: #004080; /* Fondo para el botón activo */
        color: white; /* Color del texto en el botón activo */
        border-color: #004080; /* Color del borde para el botón activo */
    }

    .pagination .page-item.disabled .page-link {
        background-color: #d6d6d6; /* Fondo para botones deshabilitados */
        color: #8c8c8c; /* Color del texto deshabilitado */
        border-color: #d6d6d6; /* Color del borde deshabilitado */
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Compras</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Botón de colapso para responsive -->
<div class="d-flex d-md-none justify-content-end p-2">
    <button class="btn btn-primary" data-widget="pushmenu"><i class="fas fa-bars"></i></button>
</div>

    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link text-center">
                <i class="fas fa-shopping-cart"></i>
                <span class="brand-text font-weight-light">Portal Compras</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item"><a href="index.php" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a></li>
                        <?php if ($logueado): ?>
                        <li class="nav-item"><a href="formulario_compra.html" class="nav-link"><i class="nav-icon fas fa-edit"></i><p>Registrar Compra</p></a></li>
                        <li class="nav-item"><a href="registrar_proponente.php" class="nav-link"><i class="nav-icon fas fa-user-plus"></i><p>Registrar Proponente</p></a></li>
                        <li class="nav-item"><a href="agregar_documento.php" class="nav-link"><i class="nav-icon fas fa-file-upload"></i><p>Agregar Documento</p></a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a href="adjudicados.php" class="nav-link"><i class="nav-icon fas fa-check-circle"></i><p>Adjudicados</p></a></li>
                        <li class="nav-item"><a href="cancelados.php" class="nav-link"><i class="nav-icon fas fa-times-circle"></i><p>Cancelados</p></a></li>
                        <li class="nav-item"><a href="vigente.php" class="nav-link"><i class="nav-icon fas fa-folder-open"></i><p>Vigente</p></a></li>
                        <li class="nav-item text-center mt-3">
                            <a href="index.php" class="btn text-white w-75" style="background-color: #ff6b6b; border: none; font-weight: bold;">
                                <i class="fas fa-handshake"></i> Soy Proveedor
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid text-center">
                    <h1 class="font-style-title">Bienvenido al Portal de Compras</h1>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <!-- Formulario de búsqueda -->
                            <form method="GET" action="" class="mb-4">
                                <div class="row g-2">
                                    <div class="col-md-9 col-sm-8">
                                        <input type="text" class="form-control" name="busqueda" placeholder="Buscar por descripción o número de compra" value="<?php echo htmlspecialchars($busqueda); ?>">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <button class="btn btn-primary w-100" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Tabla de resultados -->
                            <div class="table-responsive">
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
                                                <a class="btn btn-info btn-sm" href="resultados.php?id=<?php echo urlencode($row['no_compra']); ?>"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Paginación -->
                            <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?php echo $pagina_actual <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>&busqueda=<?php echo urlencode($busqueda); ?>" aria-label="Anterior">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                    <li class="page-item <?php echo $i == $pagina_actual ? 'active' : ''; ?>">
                                        <a class="page-link" href="?pagina=<?php echo $i; ?>&busqueda=<?php echo urlencode($busqueda); ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?php echo $pagina_actual >= $total_paginas ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>&busqueda=<?php echo urlencode($busqueda); ?>" aria-label="Siguiente">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0
            </div>
            <strong>© 2024 Portal de Compras.</strong> Todos los derechos reservados.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- Archivo JS personalizado -->
    <script src="scripts/miscript.js"></script>
            <script>
            $(document).ready(function () {
                // Activa el colapso de la barra lateral en pantallas pequeñas
                $(".sidebar-toggle").on("click", function () {
                    $(".main-sidebar").toggleClass("sidebar-collapse");
                });

                // Evitar que el menú se cierre automáticamente en móviles
                if ($(window).width() < 768) {
                    $(".main-sidebar").addClass("sidebar-collapse"); // Asegura que esté colapsado en móviles
                }
            });

            // Para actualizar el estado del menú cuando el tamaño de la ventana cambia
            $(window).resize(function () {
                if ($(window).width() < 768) {
                    $(".main-sidebar").addClass("sidebar-collapse");
                } else {
                    $(".main-sidebar").removeClass("sidebar-collapse");
                }
            });
        </script>

</script>

</body>
</html>
