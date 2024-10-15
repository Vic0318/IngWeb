<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">

    <title>Ecolac</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- DataTables CSS y JavaScript -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Spanish language file -->
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>


    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
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

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            margin-bottom: 50px;
            margin: 50px auto;
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 45px;
        }

        .card-body {
            display: flex;
            flex-wrap: nowrap; /* Cambiado a nowrap para evitar el salto a la siguiente línea */
            max-height: 500px;
        }

        .queja-info,
        .form-container {
            width: 48%;
            box-sizing: border-box;
            margin-bottom: 20px;
            
        }

        .queja-info {
            flex: 0 0 48%; /* Ajuste para evitar que las quejas se estiren más allá del contenedor */
    box-sizing: border-box;
    margin-bottom: 20px;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .queja-info,
            .form-container {
                width: 100%;
            }
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
        <a href="indexAdmin.php" class="menu-item">Inicio</a>
        <a href="vista_distribuidorAdmin.php" class="menu-item">Distribuidores</a>
        <a href="vista_quejasAdmin.php" class="menu-item">Devoluciones</a>
        <a href="vista_perfilAdmin.php" class="menu-item">Perfil</a>
        <a href="reportes.php" class="menu-item">Reportes</a>
        <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
    </nav>
    <div> <button class="menu-toggle" onclick="toggleSidebar()">☰</button></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br />
                <div class="row">
                    <div class="col-12">
                        <form action="" method="post">
                            <div class="card">
                                <div class="itemCard" style="display: flex; align-items: center; justify-content: center;">
                                    <h3>Quejas Recibidas</h3>
                                </div>
                                <div class="card-body" style="flex-wrap: wrap; overflow-y: auto; max-height: 500px;">
                                    <table id="quejas-table" class="display">
                                        
                                        <tbody>
                                            <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "ecolac";

                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }

                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        $queja_id = $_POST['id'];
                                        $nuevo_estado = $_POST['estado'];

                                        $stmt = $conn->prepare("UPDATE quejas SET estado = ? WHERE id = ?");
                                        $stmt->bind_param("si", $nuevo_estado, $queja_id);
                                        $stmt->execute();
                                        $stmt->close();
                                        echo "Estado actualizado correctamente";
                                    }

                                    $result = $conn->query("SELECT * FROM quejas");
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<div class='queja-info'>";
                                            echo "ID: " . $row["id"] . "<br>";
                                            echo "Fecha: " . $row["fecha"] . "<br>";
                                            echo "Producto: " . $row["producto"] . "<br>";
                                            echo "Unidad de Medida: " . $row["uMedida"] . "<br>";
                                            echo "Caducado: " . $row["caducado"] . "<br>";
                                            echo "Mal Sellado: " . $row["mal_sellado"] . "<br>";
                                            echo "Presentación: " . $row["presentacion"] . "<br>";
                                            echo "Contaminación: " . $row["contaminado"] . "<br>";
                                            echo "Cantidad de Producto: " . $row["cantidad"] . "<br>";
                                            echo "Observaciones: " . $row["observaciones"] . "<br>";
                                            echo "Autor: " . $row["autor"] . "<br>";
                                            echo "Estado: " . $row["estado"] . "<br>";
                                            echo "<hr>";
                                            echo "</div>";

                                            // Agregar formulario para actualizar el estado
                                            echo "<div class='form-container' style = 'height: 80px;'>";
                                            echo "<form method='post' action='vista_quejasAdmin.php'>";
                                            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                                            echo "<label for='nuevoEstado'>Nuevo Estado:</label>";
                                            echo "<select name='estado'>";
                                            echo "<option value='pendiente'>Pendiente</option>";
                                            echo "<option value='resuelto'>Resuelto</option>";
                                            echo "<option value='En_proceso'>En Proceso</option>";
                                            echo "</select>";
                                            echo "<button type='submit'>Actualizar Estado</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            
                                        }
                                    } else {
                                        echo "No hay quejas almacenadas";
                                    }

                                    $conn->close();
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../template/pie.php'); ?>
    <script>
            function toggleSidebar() {
                var sidebar = document.getElementById('sidebar');
                sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'none';
            }
    </script>
        

</body>

</html>
