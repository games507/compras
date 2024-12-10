<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">
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
                                            <a href="registrar_proponente.php" class="nav-link">
                                                <i class="nav-icon fas fa-user-plus"></i>
                                                <p>Registrar Proponente</p>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ($logueado): ?>
                                        <li class="nav-item">
                                            <a href="agregar_documento.php" class="nav-link">
                                                <i class="nav-icon fas fa-file-upload"></i>
                                                <p>Agregar Documento</p>
                                            </a>
                                        </li>
                                        <?php endif; ?>
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
                                                <p>Vigente</p>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /.sidebar-menu -->
                                </div>
                            </div> <!--end::Sidebar Wrapper-->
                        </aside> <!--end::Sidebar--> <!--begin::App Main-->