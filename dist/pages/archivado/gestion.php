<?php
include 'conexion.php'; // Incluir el archivo de conexión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Compras</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            color: #fff;
            background-image: url('/formulario/img/img1.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            /*display: flex;*/
            justify-content: center;
            align-items: center;
        }
        .container {
            background: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
            padding: 15px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.0);
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00A9E0;
            color: white;
            text-decoration: none;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #ffd700;  /*fondo del boton cuando lo pasas*/
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Compras</h1>
        <div class="button-container">
            <a href="formulario_compra.html" class="button">Nuevo Registro</a>
            <a href="buscar.php" class="button">Buscar Registro</a>
            <a href="ver_registros.php" class="button">Ver Registros</a>
        </div>
    </div>
</body>
</html>
