<?php
include 'quejas.php';
?>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
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

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            margin-bottom: 20px;
            padding:15px;
        }

        .card-body label {
            display: block;
            margin-bottom: 15px;
            
        }

        .card-body input {
            width: 100%;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }
        .cuadro1{
            padding:15px;
        }
        .btn-group .btn {
            margin: 5px;
        }

        .table-custom {
            background-color: #f0f0f0; /* Color de fondo */
            border-collapse: collapse; /* Colapsa los bordes de la tabla */
            width: 100%; /* Ancho de la tabla al 100% del contenedor */
        }

        .table-custom th, .table-custom td {
            border: 1px solid #ddd; /* Bordes de celda */
            padding: 8px; /* Espaciado interno */
            text-align: left; /* Alineación del texto */
        }
        
        .table-custom th {
            background-color: #458282; /* Color de fondo del encabezado */
            color: white; /* Color del texto en el encabezado */
        }
        
        .table-custom tr:nth-child(even) {
            background-color: #f2f2f2; /* Color de fondo para filas pares */
        }
        
        .table-custom tr:hover {
            background-color: #ddd; /* Color de fondo al pasar el ratón sobre la fila */
        }

        .table-responsive {
            overflow-x: auto;
        }
        

        @media (max-width: 768px) {
            .table-primary th,
    .table-primary td {
        padding: 5px; /* Reducir el padding en dispositivos móviles */
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

            .table-responsive {
                overflow-x: hidden;
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
   <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="" method="post" class="cuadro1">
                            <div class="card">
                                <div class="card-header">
                                    Inserte su Queja/s
                                </div>
                                
                                <div class="card-body my-auto">
                                    <div class="mb-4">
                                        <label for="" class="form-label">ID</label>
                                        <input type="hidden" class="form-control" name="id" id="id"value="<?php echo $id; ?>"
                                            aria-describedby="helpId" placeholder="ID">

                                        <label for="fecha_emision" class="form-label mt-3">Fecha de Emisión</label>
                                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha; ?>"
                                            placeholder="Fecha de Emisión" aria-describedby="helpId">
                                    </div>

                                    <div class="mb-4">
                                        <label for="nombre_producto" class="form-label">Producto</label>
                                        <input type="text" class="form-control" name="producto" id="producto" value="<?php echo $producto; ?>"
                                            placeholder="Producto" aria-describedby="helpId">

                                        <label for="unidad_medida" class="form-label mt-3">Unidad de Medida</label>
                                        <input type="text" class="form-control" name="uMedida" id="uMedida" value="<?php echo $uMedida; ?>"
                                            placeholder="Unidad de Medida" aria-describedby="helpId">
                                    </div>
                                    <!--checkbox para elegir -->
                                    <div class="mb-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="tipo_devolucion[]" id="caducado"
                                            value="CADUCADO" <?php echo ($caducado == 'CADUCADO') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="caducado">Caducado</label>
                                    </div>
                                
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="tipo_devolucion[]" id="mal_sellado"
                                            value="MAL SELLADO" <?php echo ($malSellado == 'MAL SELLADO') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="mal_sellado">Mal Sellado</label>
                                    </div>
                                
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="tipo_devolucion[]" id="presentacion"
                                            value="PRESENTACIÓN" <?php echo ($presentacion == 'PRESENTACIÓN') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="presentacion">Presentación</label>
                                    </div>
                                
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="tipo_devolucion[]" id="contaminado"
                                            value="CONTAMINADO" <?php echo ($contaminado == 'CONTAMINADO') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="contaminado">Contaminado</label>
                                    </div>
                                </div>



                                    <div class="mb-4">
                                        <label for="cantidad" class="form-label">Cantidad a devolver</label>
                                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>"
                                            placeholder="Cantidad" aria-describedby="helpId" min=0>
                                    </div>
                                    <div class="mb-4">
                                        <label for="observaciones" class="form-label">Observaciones</label>
                                        <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?php echo $observaciones; ?>"
                                            placeholder="Observaciones" aria-describedby="helpId" >
                                    </div>
                                    <div class="mb-4">
                                        <label for="autor" class="form-label">Autor</label>
                                        <input type="text" class="form-control" name="autor" id="autor"
                                        value="<?php echo $autor; ?>"
                                            placeholder="Autor de la Queja" aria-describedby="helpId">
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Button group name">
                                        <button type="submit" name="accion" value="agregar"
                                            class="btn btn-success">Agregar</button>
                                        <button type="submit" name="accion" value="editar"
                                            class="btn btn-primary" >Editar</button>
                                        <button type="submit" name="accion" value="eliminar"
                                            class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
            </div>
        
            <div class="col-12 col-md-6"style="padding:20px;">
                <div class="table-responsive overflow-y-auto">
                    <table class="table table-custom datatable">
                    <thead>
                        <tr>
                            <!--<th scope="col">ID</th>-->
                            <th scope="col">FECHA</th>
                            <th scope="col">PRODUCTO</th>
                            <!--<th scope="col">UNID.MED</th>-->
                            
                            <th scope="col">CADUCADO</th>
                            <th scope="col">MAL SELLADO</th>
                            <th scope="col">PRESENTACIÓN</th>
                            <th scope="col">CONTAMINADO</th>
                            <th scope="col">CANTIDAD</th>
                            <!--<th scope="col">OBSERVACIONES</th>-->
                            <!--<th scope="col">AUTOR</th>-->
                            <th scope="col">OPCIÓN</th>
                            <th scope="col">ESTADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaQuejas as $quejas) { ?>
                            <tr>
                                <!--<td>
                                    <?php echo $quejas['id']; ?>
                                </td>
                                -->
                                <td>
                                    <?php echo $quejas['fecha']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['producto']; ?>
                                </td>
                           <!-- <td>
                                    <?php echo $quejas['uMedida']; ?>
                                </td>
                                -->
                                <td>
                                    <?php echo $quejas['caducado']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['mal_sellado']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['presentacion']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['contaminado']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['cantidad']; ?>
                                </td>
                               <!-- <td>
                                    <?php echo $quejas['observaciones']; ?>
                                </td>
                                <td>
                                    <?php echo $quejas['autor']; ?>
                                </td>-->
                                <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value=" <?php echo $quejas['id']; ?>" />
                                    <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                </form>
                                </td>
                               
                                <td>
                                    <?php echo $quejas['estado']; ?>
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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