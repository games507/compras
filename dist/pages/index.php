<?php
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena
session_start(); // Inicia la sesión para poder acceder a $_SESSION
//Definimos la sesión como FALSE para validar elementos propios de la sesión activa
$logueado = false;
// Verifica si el usuario está logueado
$logueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Datos de la pestaña del navegador-->
    <title>Portal de Compras | Alcaldía de San Miguelito</title>
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <!-- CSS de AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Portal de Compras | Alcaldía de San Miguelito">
    <meta name="author" content="Alcaldía de San Miguelito">
    <meta name="description" content="Portal de Compras de la Alcaldía de San Miguelito. Creado con el objetivo de ser transparente con nuestros vecinos y brindar información inmediata a nuestros proveedores.">
    <meta name="keywords" content="portal de compras, alcaldia de san miguelito, municipio de san miguelito"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <style>
        /* Cambiar el fondo de la barra lateral a #002d69 */
        .main-sidebar {
            background-color: #002F6C !important;
        }

        /* Cambiar las letras de los enlaces de la barra lateral a blanco */
        .main-sidebar .nav-link {
            color: white !important;
            border-radius: 10px;
        }

        /* Cambiar el color de los íconos a blanco */
        .main-sidebar .nav-icon {
            color: white !important;
        }

        /* Cambiar el color de los íconos cuando se pasa el mouse */
        .main-sidebar .nav-link:hover .nav-icon {
            color: #00A9E0 !important;  /* Puedes cambiar el color de los íconos en hover si lo deseas */
        }

        /* Cambiar el color de los enlaces cuando se pasa el mouse */
        .main-sidebar .nav-link:hover {
            background-color: #001f4d !important; /* Puedes cambiar el fondo en hover si lo deseas */
            color: #00A9E0 !important;  /* Cambiar el color del texto al pasar el mouse */
            border-radius: 10px;
        }
        .text-bg-primary {
            background-color: #002F6C !important;
        }
        .text-bg-success{
            background-color: #002F6C !important;
        }
        .text-bg-warning{
            background-color: #002F6C !important;
        }
        .text-bg-danger{
            background-color: #002F6C !important;
        }
        .text-bg-info{
            background-color: #002F6C !important;
        }
        .text-bg-secondary{
            background-color: #002F6C !important; 
        }
        
        /* Caja 'danger' con fondo #002d69 */
        .small-box.text-bg-danger {
                background-color: #002F6C !important; /* Fondo azul oscuro */
                color: white; /* Texto blanco */
            }

            /* Caja 'cancelado' con fondo transparente, borde blanco y letra blanca */
            .small-box.text-bg-secondary {
                background-color: transparent !important; /* Fondo transparente */
                border: 2px solid white !important; /* Borde blanco */
                color: white !important; /* Texto blanco */
            }

            /* Caja 'cancelar' y 'desierta' con fondo transparente y borde blanco */
            .small-box.custom-bg {
                background-color: transparent !important; /* Fondo transparente */
                border: 2px solid white !important; /* Borde blanco */
                color: white !important; /* Texto blanco */
            }
            .small-box.text-bg-danger {
            background-color: #002F6C !important;
            color: white;
        }
            .small-box.text-bg-secondary .inner h3,
            .small-box.text-bg-secondary .inner p {
                color: #002d69 !important;
            }

            .small-box.text-bg-secondary {
                background-color: transparent !important;
                border: 2px solid white !important;
                color: white !important;
            }
            .small-box .custom-bg {
                background-color: transparent !important;
                border: 1px solid white !important;
                color: white !important;
                margin-bottom: 0px !important;
            }

            .small-box path {
                color: white !important;
            }

            .small-box:hover path {
                color: #00A9E0 !important;
            }

            .small-box-footer:hover{
                background-color: #00A9E0 !important;
                border-bottom-right-radius:  0.375rem;
                border-bottom-left-radius:  0.375rem;
            }

            .last-box{
                padding-top: 3px !important;
                padding-bottom: 3px !important;
            }
    </style>
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <b><a href="https://alcaldiasanmiguelito.gob.pa/" class="nav-link">Inicio</a></b></li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item dropdown">  
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#" class="dropdown-item">
                            <?php if ($logueado): ?>
                                <div></div>
                                <li class="user-footer"> <a href="cerrar.php" class="btn-logout-pc"><i style="margin-left:5px; margin-right:5px;" class="bi bi-box-arrow-left"></i>Salir</a> </li> <!--end::Menu Footer-->
                            <?php elseif ($logueado === false): ?>
                                <li class="user-footer"> <a href="login.php" class="btn-login-pc"><i style="margin-left:5px; margin-right:5px;" class="bi bi-person-circle"></i>Ingresar</a> </li>
                                <!--end::Menu Footer-->
                            <?php endif; ?>
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside style="background-color: #002d69 !important; color: #FFFFFF !important;" class="app-sidebar shadow"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand-pc"> <!--begin::Brand Link--> <a href="./index.php" class="brand-link"> <!--begin::Brand Image--> <img src="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/Escudo-AlcaldiaSanMiguelito-RGB_Horizontal-Blanco-1.png" alt="ASM" class="brand-image"> <!--end::Brand Image--> <!--begin::Brand Text--> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
                <div class="sidebar-wrapper">
                    <div class="wrapper">
                        <!-- Navbar -->
                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Sidebar -->
                        <aside class="main-sidebar">
                            <!-- Brand Logo -->
                            <div class="brand-ASM">
                                <div style="border-bottom: solid 1px white;"><img src="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/Escudo-AlcaldiaSanMiguelito-RGB_Horizontal-Blanco.png" alt="Logo" class="brand-image-pc"></div>
                                <div style="padding-top: 10px;"><h5><i style="padding-right: 10px;" class="fas fa-shopping-cart"></i><b>Portal de Compras</b></h5></div>
                            </div>
                            <!-- Sidebar -->
                            <div class="sidebar">
                                <!-- Sidebar Menu -->
                                <nav class="mt-2">
                                    <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <li class="nav-item">
                                            <a href="index.php" class="nav-link">
                                                <i class="nav-icon fas fa-home"></i>
                                                <p>Inicio</p>
                                            </a>
                                        </li>
                                        <?php if ($logueado): ?>
                                        <li class="nav-item">
                                            <a href="formulario_compra.html" class="nav-link">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Registrar Compra</p>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        
                                        <li class="nav-item">
                                            <a href="ver_registrosx.php" class="nav-link">
                                                <i class="nav-icon fas fa-list"></i>
                                                <p>Lista de Compras</p>
                                            </a>
                                        </li>
                                        <?php if ($logueado): ?>
                                        <li class="nav-item">
                                            <a href="buscar.php" class="nav-link">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Editar</p>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <!-- Estado de Compras -->
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
                                                <p>Vigentes</p>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /.sidebar-menu -->
                                </div>
                            </div> <!--end::Sidebar Wrapper-->
                        </aside> <!--end::Sidebar--> <!--begin::App Main-->
  <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <h3 style="padding: 12px !important;" class="mb-0"><b>Escritorio</b></h3></br>
                        </div>
        
            <?php
            // Conexión a la base de datos (ajusta según tus parámetros)
            $host = 'localhost';
            $dbname = 'musami_wp804';
            $username = 'musami_wp804';
            $password = 'cypaIaueDq9e';
            
            try {
                // Crear la conexión PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Consulta para contar los registros de la columna 'no_compra'
                $query = "SELECT COUNT(no_compra) AS total FROM wp_portalcompra";
                $stmt = $pdo->query($query);
            
                // Obtener el resultado
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $total_no_compra = $result['total']; // Total de registros
                } else {
                    $total_no_compra = 0; // Si no hay registros, devuelve 0
                }
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error en la consulta: " . $e->getMessage();
                $total_no_compra = 0; // Valor predeterminado en caso de error
            }
            ?>
            
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                <h3><?php echo $total_no_compra; ?></h3>
                        <p>Total de convocatorias</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                                </svg> <a href="./ver_registrosx.php" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Enlace <i class="bi bi-link-45deg"></i> </a>
                             
                        </div> <!--end::Small Box Widget 1-->
                        </div> <!--end::Col-->
                        <?php
            // Conexión a la base de datos (ajusta según tus parámetros)
            $host = 'localhost';
            $dbname = 'musami_wp804';
            $username = 'musami_wp804';
            $password = 'cypaIaueDq9e';
            
            try {
                // Crear la conexión PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Consulta para contar los registros de la columna 'estado'
                $query = "SELECT COUNT(*) AS total_vigente
FROM wp_portalcompra
WHERE estado = 'vigente'";
                $stmt = $pdo->query($query);
            
                // Obtener el resultado
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $total_estado = $result['total_vigente']; // Total de registros
                } else {
                    $total_estado = 0; // Si no hay registros, devuelve 0
                }
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error en la consulta: " . $e->getMessage();
                $total_estado = 0; // Valor predeterminado en caso de error
            }
            ?>
                        <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                <h3><?php echo $total_estado; ?></h3>
                                    <p>Vigentes</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                                </svg> <a href="./vigente.php" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Enlace<i class="bi bi-link-45deg"></i> </a>
                            </div> <!--end::Small Box Widget 2-->
                        </div> <!--end::Col-->
                        <?php
                        // Conexión a la base de datos (ajusta según tus parámetros)
            $host = 'localhost';
            $dbname = 'musami_wp804';
            $username = 'musami_wp804';
            $password = 'cypaIaueDq9e';
            
            try {
                // Crear la conexión PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Consulta para contar los registros de la columna 'estado'
                $query = "SELECT COUNT(*) AS total_adjudicados
FROM wp_portalcompra
WHERE estado = 'adjudicado'";
                $stmt = $pdo->query($query);
            
                // Obtener el resultado
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $total_estado = $result['total_adjudicados']; // Total de registros
                } else {
                    $total_estado = 0; // Si no hay registros, devuelve 0
                }
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error en la consulta: " . $e->getMessage();
                $total_estado = 0; // Valor predeterminado en caso de error
            }
            ?>
                        <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                            <div class="small-box text-bg-danger">
                                <div class="inner">
                                <h3><?php echo $total_estado; ?></h3>
                                    <p>Adjudicados</p>
                                </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg> <a href="./adjudicados.php" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Ver Enlace <i class="bi bi-link-45deg"></i> </a>
                            </div> <!--end::Small Box Widget 3-->
                        </div> <!--end::Col-->
        
                        <?php
// Conexión a la base de datos (ajusta según tus parámetros)
$host = 'localhost';
            $dbname = 'musami_wp804';
            $username = 'musami_wp804';
            $password = 'cypaIaueDq9e';
try {
    // Crear la conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para contar los registros de la columna 'estado' con el valor 'cancelado'
    $query_cancelado = "SELECT COUNT(*) AS total_cancelado FROM wp_portalcompra WHERE estado = 'cancelado'";
    $stmt_cancelado = $pdo->query($query_cancelado);
    $result_cancelado = $stmt_cancelado->fetch(PDO::FETCH_ASSOC);
    $total_cancelado = $result_cancelado ? $result_cancelado['total_cancelado'] : 0; // Si no hay registros, devuelve 0

    // Consulta para contar los registros de la columna 'estado' con el valor 'desierto'
    $query_desierto = "SELECT COUNT(*) AS total_desierto FROM wp_portalcompra WHERE estado = 'desierto'";
    $stmt_desierto = $pdo->query($query_desierto);
    $result_desierto = $stmt_desierto->fetch(PDO::FETCH_ASSOC);
    $total_desierto = $result_desierto ? $result_desierto['total_desierto'] : 0; // Si no hay registros, devuelve 0
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error en la consulta: " . $e->getMessage();
    $total_cancelado = 0; // Valor predeterminado en caso de error
    $total_desierto = 0; // Valor predeterminado en caso de error
}
?>

<!-- Small Box para mostrar tanto "cancelado" como "desierto" -->
<div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
    <div class="small-box text-bg-danger last-box"> <!-- Caja con fondo azul oscuro -->
        <div class="inner">
            <!-- Fila para los resultados -->
            <div class="row">
                <!-- Cuadro para Cancelado -->
                <div class="col-12 col-md-6">
                    <div class="small-box custom-bg"> <!-- Caja 'cancelado' con fondo transparente y borde blanco -->
                        <div class="inner">
                            <h3><?php echo $total_cancelado; ?></h3> <!-- Mostrar el total de "Cancelado" -->
                            <p>Cancelados</p>
                        </div>
                    </div>
                </div>
                <!-- Cuadro para Desierto -->
                <div class="col-12 col-md-6">
                    <div class="small-box custom-bg"> <!-- Caja 'desierta' con fondo transparente y borde blanco -->
                        <div class="inner">
                            <h3><?php echo $total_desierto; ?></h3> <!-- Mostrar el total de "Desierto" -->
                            <p><a href="pagina_desierto.php" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">Desiertos</a></p>
                                                            
                        </div>
                    </div>
                </div>
            </div> <!-- Fin de la fila -->
        </div>
    </div> <!-- Fin de la caja danger -->
</div> <!-- Fin del contenedor -->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <footer style="padding: 16px; color: #002F6C;">
        <div class="float-right">
            <b>Version</b> 1.0
        </div>
        <strong>© 2024 Portal de Compras.</strong> Todos los derechos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
    <script>
        const connectedSortables =
            document.querySelectorAll(".connectedSortable");
        connectedSortables.forEach((connectedSortable) => {
            let sortable = new Sortable(connectedSortable, {
                group: "shared",
                handle: ".card-header",
            });
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header",
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const sales_chart_options = {
            series: [{
                    name: "Digital Goods",
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: "Electronics",
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 300,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ["#0d6efd", "#20c997"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2023-01-01",
                    "2023-02-01",
                    "2023-03-01",
                    "2023-04-01",
                    "2023-05-01",
                    "2023-06-01",
                    "2023-07-01",
                ],
            },
            tooltip: {
                x: {
                    format: "MMMM yyyy",
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            sales_chart_options,
        );
        sales_chart.render();
    </script> <!-- jsvectormap -->
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
    <script>
        const visitorsData = {
            US: 398, // USA
            SA: 400, // Saudi Arabia
            CA: 1000, // Canada
            DE: 500, // Germany
            FR: 760, // France
            CN: 300, // China
            AU: 700, // Australia
            BR: 600, // Brazil
            IN: 800, // India
            GB: 320, // Great Britain
            RU: 3000, // Russia
        };

        // World map by jsVectorMap
        const map = new jsVectorMap({
            selector: "#world-map",
            map: "world",
        });

        // Sparkline charts
        const option_sparkline1 = {
            series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline1 = new ApexCharts(
            document.querySelector("#sparkline-1"),
            option_sparkline1,
        );
        sparkline1.render();

        const option_sparkline2 = {
            series: [{
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline2 = new ApexCharts(
            document.querySelector("#sparkline-2"),
            option_sparkline2,
        );
        sparkline2.render();

        const option_sparkline3 = {
            series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline3 = new ApexCharts(
            document.querySelector("#sparkline-3"),
            option_sparkline3,
        );
        sparkline3.render();
    </script> <!--end::Script-->
</body><!--end::Body-->
<script>
    function setActiveButton() {
            // Obtener el enlace actual
            const currentPath = window.location.pathname;
            console.log(currentPath);

            // Remover la clase 'active' de todos los botones
            buttons.forEach(button => button.classList.remove('active'));

            // Agregar la clase 'active' al botón correspondiente
            if (currentPath.includes('index.php')) {
                document.getElementById('inicio').classList.add('active');
            } else if (currentPath.includes('formulario_compra')) {
                document.getElementById('registrar').classList.add('active');
            } else if (currentPath.includes('ver_registrox')) {
                document.getElementById('lista').classList.add('active');
            }
        }
</script>
</html>