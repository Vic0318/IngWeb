<?php
include('conexion.php');

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];

    // lógica para eliminar el usuario con el ID proporcionado
    $eliminarUsuarioQuery = "DELETE FROM usuarios WHERE id = :id";
    $eliminarUsuarioStmt = $conexion->prepare($eliminarUsuarioQuery);
    $eliminarUsuarioStmt->bindParam(':id', $id);

    if ($eliminarUsuarioStmt->execute()) {
        header("Location: vista_distribuidorAdmin.php?msj=Usuario Eliminado");
        exit;
    } else {
        header("Location: vista_distribuidorAdmin.php?msj=Error al eliminar el usuario");
        exit;
    }
} else {
    header("Location: vista_distribuidorAdmin.php?msj=Acceso no autorizado");
    exit;
}
?>
