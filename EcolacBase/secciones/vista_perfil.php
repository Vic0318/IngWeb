<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>Ecolac</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 180px;
            height: 100vh;
            background-color: #f2f2f2;
            border: 1px solid #E4E4E4;
            color: #fff;
            padding-top: 20px;
            flex-shrink: 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        #content {
            flex: 1;
            padding: 20px;
            max-width: 100%;
        }

        .menu-item {
            padding: 30px;
            text-decoration: none;
            color: #000000;
            display: block;
            transition: background-color 0.3s;
        }

        .menu-item:hover {
            background-color: #cfcccc;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
                position: fixed;
                left: 0;
                top: 0;
                height: 100vh;
                background-color: #f2f2f2;
                color: #fff;
                padding-top: 20px;
                z-index: 1000;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            }
            .menu-item:hover {
                background-color: #cfcccc;
            }
            .menu-toggle {
               display: block;
                position: fixed;
                left: 20px;
                top: 20px;
                z-index: 1001;
                color: #000;
                font-size: 16px;
                cursor: pointer;
                background: none;
                border: none;
                padding: 5px;
                box-sizing: content-box;
                width: 14px; 
                height: 14px;
                line-height:16px;

            }

            #content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <nav id="sidebar" class="sidebar">
        <img src="../images/ECOLACLOGO.png" style="height: 200px; float: center;">
        <a href="index.php" class="menu-item">Inicio</a>
        <!-- <a href="vista_distribuidor.php" class="menu-item">Distribuidores</a> -->
        <a href="vista_quejas.php" class="menu-item">Devoluciones</a>
        <a href="vista_perfil.php" class="menu-item">Perfil</a>
        <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
    </nav>
   <div> <button class="menu-toggle" onclick="toggleSidebar()">☰</button></div>


<div id="content" class="content">
    <h1>Perfil</h1>
    <?php
    if (isset($_SESSION["nombre_usuario"])) {
        $usuario = $_SESSION["nombre_usuario"];
        echo "<h3>Bienvenido, $usuario</h2>";
    } else {
        header("Location: iniciar_sesion.php");
        exit();
    }
    ?>
</div>
<?php include('../template/pie.php');?>
<script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>
<!-- Se Puede agregar mas informacion que se requiera-->
</html>
