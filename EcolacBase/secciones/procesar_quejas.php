<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">

    <title>Ecolac</title>
    <link rel="stylesheet"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
            flex-shrink: 0;
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        .menu-item {
            padding: 30px;
            text-decoration: none;
            color: #fff;
            display: block;
            transition: background-color 0.3s;
        }

        .menu-item:hover {
            background-color: #555;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #content {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<nav id="sidebar" class="sidebar">
    <a href="index.php" class="menu-item">Inicio</a>
    <!-- <a href="vista_distribuidor.php" class="menu-item">Distribuidores</a> -->
    <a href="vista_quejas.php" class="menu-item">Devoluciones</a>
    <a href="vista_perfil.php" class="menu-item">Perfil</a>
    <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
</nav>

<div id="content" class="content">
    <!-- Contenido principal -->
    <h1>Procesar queja</h1>
    <!-- Puedes incluir aquí el contenido extra -->
</div>

<?php include('../template/pie.php');?>

</body>
</html>
