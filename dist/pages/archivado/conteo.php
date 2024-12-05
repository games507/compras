<?php
// Conexión a la base de datos (ajusta según tus parámetros)
$host = 'localhost';
$dbname = 'musami_wp804';
$username = 'root';
$password = 'Lrobles2508**';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener el valor (ajusta según tu estructura)
    $query = "SELECT cantidad FROM tabla WHERE id = 1";  // Cambia la consulta según tu caso
    $stmt = $pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $cantidad = $result ? $result['cantidad'] : 0;  // Establece un valor por defecto si no se encuentra el dato
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $cantidad = 0;  // En caso de error, muestra 0
}
?>

<div class="col-lg-3 col-6">
    <div class="small-box text-bg-danger">
        <div class="inner">
            <!-- Aquí mostramos la cantidad obtenida de la base de datos -->
            <h3><?php echo $cantidad; ?></h3>
            <p>Unique Visitors</p>
        </div> 
        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
            <path clip-rule="evenodd" fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
        </svg> 
        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
            More info <i class="bi bi-link-45deg"></i> 
        </a>
    </div>
</div>
