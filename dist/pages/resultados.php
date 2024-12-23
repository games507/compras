<?php 
// Luis Robles A. Desarrollador
// Municipio de San Miguelito
// Portal de Compra Noviembre 2024
// Creditos Anthony Santana Desarrollador
// Este archivo fue creado como parte del proyecto [Nombre del Proyecto]
// Supervisado por Dir. Joseph Arosemena

include 'conexion.php'; // Incluir archivo de conexión

// Recibir el parámetro 'id' (no_compra) de la URL
$no_compra = $_GET['id'] ?? null;

// Verificar si el parámetro 'id' existe
if ($no_compra) {
    // Consulta SQL con preparación para evitar SQL Injection
    $sql = "SELECT * FROM wp_portalcompra WHERE no_compra = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $no_compra);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si se encontraron datos
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Obtener documentos relacionados solo si la compra fue encontrada
        $sql_docs = "SELECT * FROM wp_docompra WHERE id_pcompra = ?";
        $stmt_docs = $conn->prepare($sql_docs);
        $stmt_docs->bind_param("i", $row['id']); // Suponiendo que 'id' es el campo clave primaria de wp_portalcompra
        $stmt_docs->execute();
        $docs_result = $stmt_docs->get_result(); // Obtener el resultado de los documentos

        // Consulta para obtener el proponente
        $sql_proponente = "SELECT * FROM wp_proponentes WHERE id_pcompra = ?";
        $stmt_proponente = $conn->prepare($sql_proponente);
        $stmt_proponente->bind_param("i", $row['id']); // Suponiendo que 'id' es el campo clave primaria
        $stmt_proponente->execute();
        $proponente_result = $stmt_proponente->get_result();
        $proponente = $proponente_result->fetch_assoc(); // Obtener el proponente si existe
    } else {
        // Si no se encuentra el registro
        $row = null;
        $docs_result = null;
        $proponente = null;
    }
} else {
    // Si no se recibe un 'id' en la URL
    $row = null;
    $docs_result = null; // Asegurarse de que esta variable esté definida
    $proponente = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Compras</title>
    <link rel="stylesheet" href="https://tabler.io/tabler/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="..\css\estilos-pc-asm.scss">
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <div style="margin-bottom: 50px; padding-top: 30px !important;" class="page-header">
            <h2 class="nombre-pc">
                <a onClick="javascript:history.go(-1)">
                    <i style="margin-right: 15px; text-decoration:none;" class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <?php echo htmlspecialchars($row['no_compra'] ?? 'Compra no encontrada'); ?>
                <?php if ($row): ?>
                    <span style="margin-left: 25px; vertical-align: top;" class="badge badge-estado">
                        <?php echo htmlspecialchars($row['estado']); ?>
                    </span>
                <?php endif; ?>
            </h2> 
            <?php if ($row): ?>
        </div>

        <div class="card cont-portal">
            <div class="card-header">
                <h5 style="padding-left: 20px;" class="card-title">Descripción</h5>
            </div>
            <div class="card-body">
                <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
            </div>
        </div>


        <div class="cont-portal">
            <div class="table-box-pc tb-pc-3" style="overflow-x: hidden !important;">
                <table>
                    <tr><th class="table-multiline">Tipo de procedimiento:</th><td><?php echo htmlspecialchars($row['tipo_procedimiento']); ?></td></tr>
                    <tr><th class="table-multiline">Objeto contractual:</th><td><?php echo htmlspecialchars($row['objeto_contractual']); ?></td></tr>
                    <tr><th class="table-multiline">Lugar de presentación:</th><td><?php echo htmlspecialchars($row['lugar_presentacion']); ?></td></tr>
                    <tr><th class="table-multiline">Término de subsanación:</th><td><?php echo htmlspecialchars($row['termino_subsanacion']); ?></td></tr>
                </table>
            </div>
        </div>
            

        <div class="highlight-cards">
            <div class="col-6 col-sm-6 col-lg-3 text-center cont-portal">
                <div class="card">
                    <div class="card-header">
                        <h5>Precio de Referencia</h5>
                    </div>
                    <div class="cont-text-cp">
                        <h4 class="font-weight-bold"><?php echo htmlspecialchars($row['precio_referencia']); ?></h4>
                        <p>Balboas</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3 text-center cont-portal">
                <div class="card">
                    <div class="card-header"><h5>Fecha de publicación</h5></div>
                    <div class="cont-text-cp">
                        <h4 class="font-weight-bold"><?php echo htmlspecialchars($row['fecha_publicacion']); ?></h4>
                        <p>Publicado</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3 text-center cont-portal">
                <div class="card">
                    <div class="card-header"><h5>Fecha de presentación</h5></div>
                    <div class="cont-text-cp"><h6 class="font-weight-bold"><?php echo htmlspecialchars($row['fecha_presentacion']); ?></h6></div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3 text-center cont-portal">
                <div class="card">
                    <div class="card-header"><h5>Fecha de apertura</h5></div>
                    <div class="cont-text-cp"><h4 class="font-weight-bold"><?php echo htmlspecialchars($row['fecha_apertura']); ?></h4></div>
                </div>
            </div>
        </div>

<!-- Caja de Proponente (solo si existe un proponente) -->
<?php
// Consulta para obtener todos los proponentes relacionados con el id_pcompra
$sql_proponente = "SELECT * FROM wp_proponentes WHERE id_pcompra = ?";
$stmt_proponente = $conn->prepare($sql_proponente);
$stmt_proponente->bind_param("i", $row['id']); // Suponiendo que 'id' es el campo clave primaria de wp_portalcompra
$stmt_proponente->execute();
$proponente_result = $stmt_proponente->get_result();
?>

<?php if ($proponente_result && $proponente_result->num_rows > 0): ?>
    <div class="cont-portal">
        <h3>Proponentes</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Oferta</th>
                    <th>Estado</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($proponente = $proponente_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($proponente['proponente']); ?></td>
                        <td><?php echo htmlspecialchars($proponente['oferta']); ?></td>
                        <td><?php echo htmlspecialchars($proponente['aprobado']); ?></td>
                        <td><?php echo htmlspecialchars($proponente['hora']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p class="cont-portal">No se encontraron proponentes para esta compra.</p>
<?php endif; ?>


    <!-- Documentos Relacionados -->
    <div class="cont-portal">
        <h3>Documentos</h3>
        <div class="table-box-pc tb-pc-1">
            <?php if ($docs_result && $docs_result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($doc = $docs_result->fetch_assoc()): ?>
                            <tr>
                                <td><i style="color: #00A9E0" class="fa fa-file-pdf-o" aria-hidden="true"></i></td>
                                <td><?php echo htmlspecialchars($doc['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($doc['date']); ?></td>
                                <td><a class="btn badge-estado" href="uploads/<?php echo htmlspecialchars($doc['pdf']); ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i>  Ver PDF</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay documentos relacionados con esta compra.</p>
            <?php endif; ?>
        </div>
            <?php else: ?>
                <p>No se encontró la información solicitada.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
