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
    <!--Datos de la pestaña del navegador-->
    <title>Lista de Compras | Portal de Compras</title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
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
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <?php include 'menu.php';?>
    <main class="app-main">
        <!-- Content Wrapper -->
        <div class="">
            <section>
                <div class="title-table-pc container-fluid text-center">
                    <h2><b>Listado de Compras</b></h2>
                </div>
            </section>

            <section class="content cont-pc">
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
                                        <button class="btn btn-search-pc w-100" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Tabla de resultados -->
                            <div class="table-box-pc tb-pc-1">
                                <table>
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
                            					$fecha_pub = date("d-m-Y", strtotime($row['fecha_publicacion']));
                                                ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($fecha_pub); ?></td>
                                            <td><span class="badge-color"><?php echo htmlspecialchars($row['estado']); ?></span></td>
                                            <td>
                                                <a href="resultados.php?id=<?php echo urlencode($row['no_compra']); ?>"><i class="fas fa-eye"></i></a>
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
        <footer style="padding: 16px; color: #002F6C;">
            <div class="float-right">
                <b>Version</b> 1.0
            </div>
            <strong>© 2024 Portal de Compras.</strong> Todos los derechos reservados.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var elementos = document.querySelectorAll('.badge-color');
      elementos.forEach(function(elemento) {
        if (elemento.textContent.includes('Adjudicado')) {
          elemento.classList.add('adjudicado');
        }else if (elemento.textContent.includes("Vigente")){
          elemento.classList.add("vigente");
        }else{
          elemento.classList.add("cancelado-desierto");
        }
      });
    });
  </script>
</body>
</html>
