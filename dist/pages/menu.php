<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Datos de la pestaña del navegador-->
    <link rel="shortcut icon" href="https://alcaldiasanmiguelito.gob.pa/wp-content/uploads/2024/10/cropped-Escudo-AlcaldiaSanMiguelito-RGB_Vertical-Blanco.png" />
    <!-- CSS de AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .active, .main-sidebar .nav-link:hover {
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
                                            <a id="inicio" href="index.php" class="nav-link">
                                                <i class="nav-icon fas fa-home"></i>
                                                <p>Inicio</p>
                                            </a>
                                        </li>
                                        <?php if ($logueado): ?>
                                        <li class="nav-item">
                                            <a id="registrar" href="formulario_compra.html" class="nav-link">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Registrar Compra</p>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        
                                        <li class="nav-item">
                                            <a id="lista" href="ver_registrosx.php" class="nav-link">
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
                        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        $(function() {
            var current = location.pathname;
            $('.nav-item .nav-link').each(function() {
                var $this = $(this);
                if (current.endsWith($this.attr('href'))) {
                // if the current path is like this link, make it active
                    $this.addClass('active');
                }
            });
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
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

