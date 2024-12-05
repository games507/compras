<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<!DOCTYPE html>
<html lang="es">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Portal Compra</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="estilos.css">
    
    <style>
        /* Estilos del mensaje emergente */
        .popup-message {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
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
    <div class="form-container">
        <h2>Formulario de Registro de Compra</h2>
        <a href="index.php" class="button">Volver</a>
        <form id="compraForm" action="procesar_formulario.php" method="POST">
            <div class="form-row">
                <div class="form-group">
              
                    <label for="No_Compra_Menor">No Compra Menor:</label>
                    <input type="text" name="no_compra" required>
                </div>

                <div class="form-group">
                    <label for="Tipo_de_procedimiento">Tipo de Procedimiento:</label>
                    <input type="text" name="tipo_procedimiento" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Objeto_Contractual">Objeto Contractual:</label>
                    <input type="text" name="objeto_contractual" required>
                </div>

                <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <input type="text" name="descripcion" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Fecha_de_publicacion">Fecha de Publicación:</label>
                    <input type="date" name="fecha_publicacion" required>
                </div>

                <div class="form-group">
                    <label for="Fecha_y_hora_presentacion">Fecha y Hora de Presentación:</label>
                    <input type="datetime-local" name="fecha_presentacion" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Fecha_y_hora_apertura">Fecha y Hora de Apertura:</label>
                    <input type="datetime-local" name="fecha_apertura" required>
                </div>

                <div class="form-group">
                    <label for="Lugar_presentacion">Lugar de Presentación:</label>
                    <input type="text" name="lugar_presentacion" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Termino_subsanacion">Término de Subsanación:</label>
                    <input type="text" name="termino_subsanacion" required>
                </div>

                <div class="form-group">
                    <label for="Precio_referencia">Precio de Referencia:</label>
                    <input type="text" name="precio_referencia" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Estado">Estado:</label>
                    <input type="text" name="estado" required>
                </div>

                <div class="form-group">
                    <label for="Pliego_cargos">Pliego de Cargos:</label>
                    <input type="text" name="pliego_cargos">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Aviso_convocatoria">Aviso de Convocatoria:</label>
                    <input type="text" name="aviso_convocatoria">
                </div>

                <div class="form-group">
                    <label for="Acta_apertura">Acta de Apertura:</label>
                    <input type="text" name="acta_apertura">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="Resolucion_adjudicacion">Resolución de Adjudicación:</label>
                    <input type="text" name="resolucion_adjudicacion">
                </div>

                <div class="form-group">
                    <label for="Otros">Otros:</label>
                    <input type="text" name="otros">
                </div>
            </div>

            <div class="form-group">
                <label for="Proponentes">Proponentes:</label>
                <input type="text" name="proponentes">
            </div>

            <input type="submit" value="registrar">
            
        </form>
<!-- Mensaje emergente -->

<div id="popupMessage" class="popup-message">
            Registro guardado con éxito
        </div>
    </div>
    <script>
        document.getElementById('compraForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío normal del formulario
            const formData = new FormData(this);

            fetch('procesar_formulario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes("Registro insertado con éxito")) {
                    mostrarPopup("Registro guardado con éxito");
                } else {
                    mostrarPopup("Error al guardar el registro");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarPopup("Error al guardar el registro");
            });
        });

        function mostrarPopup(mensaje) {
            const popup = document.getElementById('popupMessage');
            popup.textContent = mensaje;
            popup.classList.add('show');
            setTimeout(() => {
                popup.classList.remove('show');
            }, 3000); // Ocultar después de 3 segundos
        }
    </script>      
</body>
</html>
