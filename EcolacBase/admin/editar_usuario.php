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

    <title>Edit Distribuidor Ecolac (Admin)</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0px;
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

        .titulosPage {
            padding-left: 90px;
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
        <a href="indexAdmin.php" class="menu-item">Inicio</a>
        <a href="vista_distribuidorAdmin.php" class="menu-item">Distribuidores</a>
        <a href="vista_quejasAdmin.php" class="menu-item">Devoluciones</a>
        <a href="vista_perfilAdmin.php" class="menu-item">Perfil</a>
        <a href="sesionOut.php" class="menu-item">Cerrar sesión</a>
    </nav>
    <section class="titulosPage">
        <h2>Editar Distribuidor</h2>
        <hr>
        <h5>Edite los campos que deseé</h5>
        <section class="serviciosCards">
            <script>
                history.pushState(null, null, document.URL);
                window.addEventListener('popstate', function () {
                    history.pushState(null, null, document.URL);
                });
            </script>

            <article class="itemCard">
                <img src="../images/ECOLACLOGO.png">
                <h3>DISTRIBUIDORES</h3>

                <?php
                if (isset($_POST['editar'])) {
                    $id = $_POST['id'];

                    $obtenerUsuarioQuery = "SELECT * FROM usuarios WHERE id = :id";
                    $obtenerUsuarioStmt = $conexion->prepare($obtenerUsuarioQuery);
                    $obtenerUsuarioStmt->bindParam(':id', $id);
                    $obtenerUsuarioStmt->execute();
                    $usuario = $obtenerUsuarioStmt->fetch(PDO::FETCH_ASSOC);

                    if ($usuario) {
                        $nombres = $usuario['nombres'];
                        $usuarioNombre = $usuario['usuario'];
                        $contrasenia = $usuario['contrasenia'];
                        $id_cargo = $usuario['id_cargo'];
                        ?>
                        <form action="updateDist.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="grupoInput">
                                <label class="form-label" for="nombres">Nombres</label>
                                <input class="caja" type="text" name="nombres" id="nombres"
                                    placeholder="Ingrese sus dos primeros Nombres" value="<?php echo $nombres; ?>" required>
                            </div>
                            <div class="grupoInput">
                                <label class="form-label" for="usuario">Usuario</label>
                                <input class="caja" type="text" name="usuario" id="usuario"
                                    placeholder="Ingrese un Usuario (Nombre)" value="<?php echo $usuarioNombre; ?>" required>
                            </div>
                            <div class="grupoInput">
                                <label class="hidden" for="contrasenia">Contraseña</label>
                                <input class="caja" type="password" name="contrasenia" id="contrasenia"
                                    placeholder="Ingrese una contraseña (usted elige)" value="<?php echo $contrasenia; ?>"
                                    required>
                                <div class="mostrar-contra-btn" onmousedown="mostrarContrasenia()"
                                    onmouseup="ocultarContrasenia()" ontouchstart="mostrarContrasenia()"
                                    ontouchend="ocultarContrasenia()">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                                        <path
                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm51.3 163.3l-41.9-33C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5zm-88-69.3L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8z" />
                                    </svg>
                                </div>
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
                                    <option value="1" <?php echo ($id_cargo == 1) ? 'selected' : ''; ?>>1-Administrador</option>
                                    <option value="2" <?php echo ($id_cargo == 2) ? 'selected' : ''; ?>>2-Cliente</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <button type="submit"  name="editar"value="editar" class="editar">Actualizar <span class="fa fa-user-plus"></span></button>
                            </div>
                        </form>
                        <!-- Fin del formulario de edición -->
                        <?php

                    } else {
                        header("Location: vista_distribuidorAdmin.php?msj=Usuario no encontrado");
                        exit;
                    }
                } else {
                    header("Location: vista_distribuidorAdmin.php?msj=Acceso no autorizado");
                    exit;
                }
                ?>
            </article>
        </section>
    </section>