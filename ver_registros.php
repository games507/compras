<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

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
</head> <!--end::Head--> <!--begin::Body-->
<?php
include 'conexion.php'; // Incluir el archivo de conexión

// Consultar datos de la base de datos
$sql = "SELECT no_compra, fecha_publicacion, estado FROM wp_portalcompra";
$result = $conn->query($sql);
// Verifica si la consulta se ejecutó correctamente
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
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #002d69;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #002d69;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            cursor: pointer;
        }
        .field {
            margin-bottom: 15px;
        }
        .field strong {
            display: block;
            margin-bottom: 5px;
        }
        .return-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .return-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Portal de Compras</h2>
        <table>
            <thead>
                <tr>
                    <th>No Compra Menor</th>
                    <th>Fecha de Publicación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['no_compra']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_publicacion']); ?></td>
                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        <td>
                            <button class="button" onclick="openModal('<?php echo htmlspecialchars($row['no_compra']); ?>')">Ver Más</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <!-- Botón de regreso -->
        <a href="javascript:history.back()" class="return-button">Regresar</a>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Detalles del Registro</h2>
            <div id="modalDetails"></div>
        </div>
    </div>

    <script>
        function openModal(no_compra) {
            // Fetch details from the database using AJAX
            fetch('obtener_detalles.php?no_compra=' + encodeURIComponent(no_compra))
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        let details = `
                            <div class="field">
                                <strong>No Compra Menor:</strong> ${data.no_compra}
                            </div>
                            <div class="field">
                                <strong>Tipo de Procedimiento:</strong> ${data.tipo_procedimiento}
                            </div>
                            <div class="field">
                                <strong>Objeto Contractual:</strong> ${data.objeto_contractual}
                            </div>
                            <div class="field">
                                <strong>Descripción:</strong> ${data.descripcion}
                            </div>
                            <div class="field">
                                <strong>Fecha de Publicación:</strong> ${data.fecha_publicacion}
                            </div>
                            <div class="field">
                                <strong>Estado:</strong> ${data.estado}
                            </div>
                            <div class="field">
                                <strong>Pliego de Cargos:</strong> <a href="${data.pliego_cargos}" target="_blank">Ver Archivo</a>
                            </div>
                            <div class="field">
                                <strong>Aviso de Convocatoria:</strong> <a href="${data.aviso_convocatoria}" target="_blank">Ver Archivo</a>
                            </div>
                        `;
                        document.getElementById('modalDetails').innerHTML = details;
                        document.getElementById('myModal').style.display = "block";
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }

        window.onkeydown = function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        }
    </script>
</body>
</html>
