<?php
require_once("conexion.php");
//agregar nuevo distribuidor
if (!empty($_POST['nombres']) && !empty($_POST['usuario']) && !empty($_POST['contrasenia']) && !empty($_POST['id_cargo'])) {
    $nombres = filter_input(INPUT_POST, 'nombres', FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $contrasenia = $_POST['contrasenia'];
    $id_cargo = intval($_POST['id_cargo']);

    $checkCargoQuery = "SELECT id FROM cargo WHERE id = :id_cargo";
    $checkCargoStmt = $conexion->prepare($checkCargoQuery);
    $checkCargoStmt->bindParam(':id_cargo', $id_cargo);
    $checkCargoStmt->execute();

    if ($checkCargoStmt->rowCount() > 0) {
        $sql = "INSERT INTO usuarios(nombres, usuario, contrasenia, id_cargo) VALUES(:nombres, :usuario, :contrasenia, :id_cargo)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasenia', $contrasenia);
        $stmt->bindParam(':id_cargo', $id_cargo);

        if ($stmt->execute()) {
            header("location:vista_distribuidorAdmin.php?msj=Usuario Agregado");
            exit();
        } else {
            $errorInfo = $stmt->errorInfo();
            header("location:vista_distribuidorAdmin.php?msj=Error Usuario Agregado&error={$errorInfo[2]}");
            exit();
        }
    } else {
        header("location:vista_distribuidorAdmin.php?msj=Cargo no válido");
        exit();
    }
} else {
    header("location:vista_distribuidorAdmin.php?msj=Llene todos los campos requeridos");
    exit();
}
?>
