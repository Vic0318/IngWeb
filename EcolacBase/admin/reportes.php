<?php
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
        .scroll-container {
            max-height: 700px; /* ajusta la altura máxima según tus necesidades */
            max-width: 1200px; /* ajusta el ancho máximo según tus necesidades */
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
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
        <a href="indexAdmin.php" class="menu-item">Inicio</a>
        <a href="vista_distribuidorAdmin.php" class="menu-item">Distribuidores</a> 
        <a href="vista_quejasAdmin.php" class="menu-item">Devoluciones</a>
        <a href="vista_perfilAdmin.php" class="menu-item">Perfil</a>
        <a href="reportes.php" class="menu-item">Reportes</a>
        <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
    </nav>
   <div> <button class="menu-toggle" onclick="toggleSidebar()">☰</button></div>
    <section class="serviciosCards">
        <script>
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function () {
                history.pushState(null, null, document.URL);
            });
        </script>

        <article class="itemCard">
            <img src="../images/reportes.png">
            <h3>REPORTES</h3>
            <form method="post">
                <div class="grupoInput">
                    <label for="caducado">Filtrar por Caducado:</label>
                    <select name="caducado">
                        <option value="">Todos</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="grupoInput">
                    <label for="mal_sellado">Filtrar por Mal Sellado:</label>
                    <select name="mal_sellado">
                        <option value="">Todos</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="grupoInput">
                    <label for="presentacion">Filtrar por Presentación:</label>
                    <select name="presentacion">
                        <option value="">Todos</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="grupoInput">
                    <label for="contaminado">Filtrar por Contaminado:</label>
                    <select name="contaminado">
                        <option value="">Todos</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit">Aplicar Filtros</button>
            </form>
        </article>
    

    <?php
    // Función para convertir valores 0 y 1 a 'No' y 'Sí'
    function convertirSiNo($valor)
    {
        return ($valor == 1) ? 'Sí' : 'No';
    }

    // Verifica si se ha enviado el formulario con filtros
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $whereCondition = " WHERE 1";

        if (isset($_POST['caducado']) && $_POST['caducado'] !== '') {
            $caducado = $_POST['caducado'];
            $whereCondition .= " AND caducado = '$caducado'";
        }

        if (isset($_POST['mal_sellado']) && $_POST['mal_sellado'] !== '') {
            $mal_sellado = $_POST['mal_sellado'];
            $whereCondition .= " AND mal_sellado = '$mal_sellado'";
        }

        if (isset($_POST['presentacion']) && $_POST['presentacion'] !== '') {
            $presentacion = $_POST['presentacion'];
            $whereCondition .= " AND presentacion = '$presentacion'";
        }

        if (isset($_POST['contaminado']) && $_POST['contaminado'] !== '') {
            $contaminado = $_POST['contaminado'];
            $whereCondition .= " AND contaminado = '$contaminado'";
        }

        $sql = "SELECT * FROM quejas $whereCondition";

        try {
            // Realizar la consulta SQL
            $stmt = $conexion->query($sql);

            // Mostrar todos los resultados si no hay filtro
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
            echo '<div class="scroll-container">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Imprimir los resultados con formato
                echo '<div class="result-container">';
                echo '<p>ID: ' . $row["id"] . '</p>';
                echo '<p>Fecha: ' . $row["fecha"] . '</p>';
                echo '<p>Producto: ' . $row["producto"] . '</p>';
                echo '<p>Unidad de Medida: ' . $row["uMedida"] . '</p>';
                echo '<p>Caducado: ' . convertirSiNo($row["caducado"]) . '</p>';
                echo '<p>Mal Sellado: ' . convertirSiNo($row["mal_sellado"]) . '</p>';
                echo '<p>Presentación: ' . convertirSiNo($row["presentacion"]) . '</p>';
                echo '<p>Contaminación: ' . convertirSiNo($row["contaminado"]) . '</p>';
                echo '<p>Cantidad de Producto: ' . $row["cantidad"] . '</p>';
                echo '<p>Observaciones: ' . $row["observaciones"] . '</p>';
                echo '<p>Autor: ' . $row["autor"] . '</p>';
                echo '<p>Estado: ' . $row["estado"] . '</p>';
                echo '</div>';
        
                echo "<hr>";
            }
            echo '</div>';
        } else {
            echo '<p>No hay resultados que coincidan con los filtros seleccionados.</p>';
        }
            
        } catch (PDOException $e) {
            echo '<p>Error en la consulta: ' . $e->getMessage() . '</p>';
        }
    }
    ?>
</section>
<script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>

</html>