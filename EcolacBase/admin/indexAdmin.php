<?php
session_start();
include('conexion.php');
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
        
        .grafico-pastel {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 300px;
            margin: auto;
            margin-top: 25px; 
            margin-bottom: 25px; 
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

        .dashboard {
            display: flex;
            justify-content: space-around;
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 20px;
        }

        .dashboard p {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav id="sidebar" class="sidebar">
        <img src="../images/ECOLACLOGO.png" style="height: 200px; float: center;">
        <a href="indexAdmin.php" class="menu-item">Inicio</a>
        <a href="vista_distribuidorAdmin.php" class="menu-item">Distribuidores</a>
        <a href="vista_quejasAdmin.php" class="menu-item">Devoluciones</a>
        <a href="vista_perfilAdmin.php" class="menu-item">Perfil</a>
        <a href="reportes.php" class="menu-item">Reportes</a>
        <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
    </nav>
   <div> <button class="menu-toggle" onclick="toggleSidebar()">☰</button></div>
<section class="titulosPage">
    
        <h2>
        <?php
        if (isset($_SESSION["nombre_usuario"])) {
            $usuario = $_SESSION["nombre_usuario"];
            echo "Bienvenido, $usuario";
        } else {
            exit(); 
        }
        /* contar Admin y clientes*/
        $queryClientes = "SELECT COUNT(*) as totalClientes FROM usuarios WHERE id_cargo = 2"; // Suponiendo que el id_cargo para clientes es 2
            $resultadoClientes = $conexion->query($queryClientes);
            $rowClientes = $resultadoClientes->fetch(PDO::FETCH_ASSOC);
            $totalClientes = $rowClientes['totalClientes'];
            
            $queryAdmins = "SELECT COUNT(*) as totalAdmins FROM usuarios WHERE id_cargo = 1"; // Suponiendo que el id_cargo para administradores es 1
            $resultadoAdmins = $conexion->query($queryAdmins);
            $rowAdmins = $resultadoAdmins->fetch(PDO::FETCH_ASSOC);
            $totalAdmins = $rowAdmins['totalAdmins'];
        ?>
        <img src="../images/userDemo.png" style="height: 200px; float: center;">
        </h2>

        <div class="dashboard">
            <p>Total de Distribuidores: <?php echo $totalClientes; ?></p>
            <p>Total de Administradores: <?php echo $totalAdmins; ?></p>
        </div>
        
        <div class="grafico-pastel">
            <canvas id="pastelChart"></canvas>
        </div>
        
        <hr>
        <h5><a>En este espacio podrá ingresar o eliminar distribuidores, así como personal administrativo<a></h5><br>
        <a>Navegue por el menú lateral en la sección "Distribuidores" para comenzar a ingresar personal.</a>
    </section>

<?php include('../template/pie.php');?>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'none';
        }
        /* Grafico*/
        var ctx = document.getElementById('pastelChart').getContext('2d');
        var pastelChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Administradores', 'Distribuidores'],
                datasets: [{
                    data: [<?php echo $totalClientes; ?>, <?php echo $totalAdmins; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            }
        });
    </script>
</body>
</html>
