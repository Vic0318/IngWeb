<?php
include('conexion.php');

if (isset($_POST['editar'])) {
    $id = $_POST['id']; 

    $nombres = $_POST['nombres'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $id_cargo = $_POST['id_cargo'];

    $actualizarUsuarioQuery = "UPDATE usuarios SET nombres = :nombres, usuario = :usuario, contrasenia = :contrasenia, id_cargo = :id_cargo WHERE id = :id";
    $actualizarUsuarioStmt = $conexion->prepare($actualizarUsuarioQuery);
    $actualizarUsuarioStmt->bindParam(':nombres', $nombres);
    $actualizarUsuarioStmt->bindParam(':usuario', $usuario);
    $actualizarUsuarioStmt->bindParam(':contrasenia', $contrasenia);
    $actualizarUsuarioStmt->bindParam(':id_cargo', $id_cargo);
    $actualizarUsuarioStmt->bindParam(':id', $id);

    if ($actualizarUsuarioStmt->execute()) {
        header("Location: vista_distribuidorAdmin.php?msj=");
        exit;
    } else {
        header("Location: vista_distribuidorAdmin.php?msj=Error al actualizar");
        exit;
    }
} else {
    header("Location: vista_distribuidorAdmin.php?msj=Acceso no autorizado");
    exit;
}
?>
