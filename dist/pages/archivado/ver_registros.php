<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'musami_wp804';
$username = 'root';
$password = 'Lrobles2508**';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Configuración de paginación
    $registros_por_pagina = 5; // Número de registros por página
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $offset = ($pagina_actual - 1) * $registros_por_pagina;

    // Consulta para obtener registros con paginación
    $query = "SELECT * FROM wp_portalcompra LIMIT :offset, :registros";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':registros', $registros_por_pagina, PDO::PARAM_INT);
    $stmt->execute();
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para contar el total de registros
    $query_total = "SELECT COUNT(*) AS total FROM wp_portalcompra";
    $stmt_total = $pdo->query($query_total);
    $total_registros = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];
    $total_paginas = ceil($total_registros / $registros_por_pagina);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Registros</title>
    <!-- AdminLTE y Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/adminlte.min.css">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            background-color: #f8f9fa;
            border: none;
            box-shadow: none;
        }
        .pagination {
            justify-content: center;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="card-title">Registros de wp_portalcompra</h3>
            </div>
            <div class="card-body">
                <?php if (count($registros) > 0): ?>
                    <?php foreach ($registros as $registro): ?>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Compra</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($registro['no_compra']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tipo Procedimiento</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($registro['tipo_procedimiento']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Objeto Contractual</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($registro['objeto_contractual']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" value="<?php echo htmlspecialchars($registro['descripcion']); ?>">
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No hay registros disponibles.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($pagina_actual > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                            <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                                <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($pagina_actual < $total_paginas): ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- AdminLTE y Bootstrap JS -->
    <script src="path/to/bootstrap.bundle.min.js"></script>
    <script src="path/to/adminlte.min.js"></script>
</body>
</html>
