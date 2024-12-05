<?php
include 'conexion.php'; // Incluir el archivo de conexión

// Número de registros por página
$registros_por_pagina = 10;

// Verificar en qué página estamos
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) {
    $pagina_actual = 1;
}

// Calcular el offset para la consulta SQL
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Contar el número total de registros
$sql_total = "SELECT COUNT(*) as total FROM wp_portalcompra";
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
    <!-- Enlace a la hoja de estilos de Bootstrap para diseño responsivo -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a la hoja de estilos de Font Awesome para usar íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #002d69;
            margin-bottom: 20px;
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
            padding: 10px 15px;
            border-radius: 50px; /* Botón más redondeado */
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #0056b3;
            transform: translateY(-2px); /* Efecto de elevación al pasar el mouse */
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 16px;
            margin: 0 5px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
        .pagination .active {
            background-color: #0056b3;
            pointer-events: none;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Portal de Compras</h2>
        <table class="table table-striped table-responsive">
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
                            $descripcion_corta = mb_substr($row['descripcion'], 0, 50); // Extrae los primeros 50 caracteres
                            echo htmlspecialchars($descripcion_corta) . (strlen($row['descripcion']) > 50 ? '...' : '');
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['fecha_publicacion']); ?></td>
                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        <td>
                            <!-- Botón con ícono de ojo -->
                            <a class="button" href="resultados.php?id=<?php echo urlencode($row['no_compra']); ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="pagination">
            <?php if ($pagina_actual > 1): ?>
                <a href="?pagina=<?php echo $pagina_actual - 1; ?>">« Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?php echo $i; ?>" 
                   class="<?php echo $i == $pagina_actual ? 'active' : ''; ?>">
                   <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($pagina_actual < $total_paginas): ?>
                <a href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente »</a>
            <?php endif; ?>
        </div>

        <!-- Botón de regreso -->
        <a href="javascript:history.back()" class="return-button">Regresar</a>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
