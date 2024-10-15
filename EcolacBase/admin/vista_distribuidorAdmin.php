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
    <!-- Librerias DataTables jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- languaje file -->
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>

    <!--   CSS y JavaScript -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    
   <script>
    $(document).ready(function () {
        $('.table-custom').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }
        });
    });
</script>

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
        .table-custom {
            background-color: #f8d7da; 
        }
        
        .table-custom td,
        .table-custom th {
            color: #721c24;
        }
        .table-custom th{
            color: #458282
        }
        .table-custom tbody tr:hover {
            background-color: #9fdede;
        }
        
        .table-custom .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        
        .table-custom .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }
        
        .table-custom .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .table-custom .btn-danger:hover {
            background-color: #a71d2a;
            border-color: #a71d2a;
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
            <img src="../images/ECOLACLOGO.png">
            <h3>NUEVOS DISTRIBUIDORES</h3>
            <h5>Podrá agregar o eliminar a sus distribuidores</h5>
            <form action="agregarDist.php" method="post">
                <div class="grupoInput">
                    <label class="form-label" for="nombres">Nombres</label>
                    <input class="caja" type="text" name="nombres" id="nombres"
                        placeholder="Ingrese sus dos primeros Nombres" required>
                </div>
                <div class="grupoInput">
                    <label class="form-label" for="usuario">Usuario</label>
                    <input class="caja" type="text" name="usuario" id="usuario"
                        placeholder="Ingrese un Usuario (Nombre)" required>
                </div>
                <div class="grupoInput">
                    <label class="form-label" for="contrasenia">Contraseña</label>
                    <input class="caja" type="password" name="contrasenia" id="contrasenia"
                        placeholder="Ingrese una contraseña (usted elige)" required>
                    <div class="mostrar-contra-btn" onmousedown="mostrarContrasenia()" onmouseup="ocultarContrasenia()"
                        ontouchstart="mostrarContrasenia()" ontouchend="ocultarContrasenia()"><svg
                            xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                            <path
                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm51.3 163.3l-41.9-33C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5zm-88-69.3L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8z" />
                        </svg></div>
                </div>
                <script>
                    var inputContrasenia = document.getElementById("contrasenia");
                    var mostrarContraBtn = document.querySelector(".mostrar-contra-btn");

                    function mostrarContrasenia() {
                        inputContrasenia.type = "text";
                    }

                    function ocultarContrasenia() {
                        inputContrasenia.type = "password";
                    }
                </script>

                <div class="grupoInput">
                    <label class="form-label" for="id_cargo">Cargo</label>
                    <select class="caja" name="id_cargo" id="id_cargo" required>
                        <option value="1">1-Administrador</option>
                        <option value="2">2-Cliente</option>
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="insertar">Añadir <span class="fa fa-user-plus"></span></button>
                </div>
            </form>
        </article>
        
        <div class="table-responsive">
    <table class="table table-custom">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            foreach ($usuarios as $r):
                $cargoSql = "SELECT descripcion FROM cargo WHERE id = :id_cargo";
                $cargoStmt = $conexion->prepare($cargoSql);
                $cargoStmt->bindParam(':id_cargo', $r['id_cargo'], PDO::PARAM_INT);
                $cargoStmt->execute();
                $cargo = $cargoStmt->fetch(PDO::FETCH_ASSOC);
                $nombreCargo = $cargo['descripcion'];
                ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['nombres'] ?></td>
                    <td><?= $r['usuario'] ?></td>
                    <td><?= $r['contrasenia'] ?></td>
                    <td><?= $nombreCargo ?></td>
                    <td>
                        <form action="editar_usuario.php" method="post">
                            <input type="hidden" name="id" value="<?= $r['id'] ?>">
                            <button type="submit" name="editar" class="btn btn-info">Actualizar</button>
                        </form>
                        <form action="eliminar_usuario.php" method="post">
                            <input type="hidden" name="id" value="<?= $r['id'] ?>">
                            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

            
            <div id="elim">
                <?php
                if (isset($_GET['msj'])) {
                    echo "<div class='alert alert-info'>" . $_GET['msj'] . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    </section>
    
    
    <?php include('../template/pie.php'); ?>
<script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = (sidebar.style.display === 'none' || sidebar.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>


</html>