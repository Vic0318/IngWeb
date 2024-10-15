<?php
//INSERT INTO `quejas` (`id`, `fecha`, `producto`, `uMedida`) VALUES (NULL, '2023-11-10', 'Yogurt de Fresa', 'u');

include_once '../configuraciones/BaseDatos.php';
$conexionBD = BD::getInstance();
//captar la informacion si no tiene pone nulo
$id = isset($_POST['id']) ? $_POST['id'] : '';
$fecha = isset($_POST['fecha']) ? date('Y-m-d', strtotime($_POST['fecha'])) : '';
$producto = isset($_POST['producto']) ? $_POST['producto'] : '';
$uMedida = isset($_POST['uMedida']) ? $_POST['uMedida'] : '';

$tipoDevolucionArray = isset($_POST['tipo_devolucion']) ? $_POST['tipo_devolucion'] : array();
$caducado = in_array('CADUCADO', $tipoDevolucionArray) ? 1 : 0;
$malSellado = in_array('MAL SELLADO', $tipoDevolucionArray) ? 1 : 0;
$presentacion = in_array('PRESENTACIÓN', $tipoDevolucionArray) ? 1 : 0;
$contaminado = in_array('CONTAMINADO', $tipoDevolucionArray) ? 1 : 0;

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO `quejas` (`id`, `fecha`, `producto`, `uMedida`, `caducado`, `mal_sellado`, `presentacion`, `contaminado`)
                    VALUES (NULL, :fecha, :producto, :uMedida, :caducado, :mal_sellado, :presentacion, :contaminado)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':fecha', $fecha);
            $consulta->bindParam(':producto', $producto);
            $consulta->bindParam(':uMedida', $uMedida);
            $consulta->bindParam(':caducado', $caducado);
            $consulta->bindParam(':mal_sellado', $malSellado);
            $consulta->bindParam(':presentacion', $presentacion);
            $consulta->bindParam(':contaminado', $contaminado);
            $consulta->execute();
            break;

            case 'editar':
                $sql = "UPDATE quejas SET
                            `fecha` = :fecha,
                            `producto` = :producto,
                            `uMedida` = :uMedida,
                            `caducado` = :caducado,
                            `mal_sellado` = :mal_sellado,  
                            `presentacion` = :presentacion,
                            `contaminado` = :contaminado
                            WHERE id = :id";
                                        
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id', $id);
                $consulta->bindParam(':fecha', $fecha);
                $consulta->bindParam(':producto', $producto);
                $consulta->bindParam(':uMedida', $uMedida);
                $consulta->bindParam(':caducado', $caducado);
                $consulta->bindParam(':mal_sellado', $malSellado);  
                $consulta->bindParam(':presentacion', $presentacion);
                $consulta->bindParam(':contaminado', $contaminado);
                $consulta->execute();
            break;
            
            
            

        case 'eliminar':
            $sql = "DELETE FROM `quejas` WHERE `id` =:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;

        case "Seleccionar":
            $sql = "SELECT * FROM quejas WHERE id =:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $quejas = $consulta->fetch(PDO::FETCH_ASSOC);
            
            $fecha = $quejas['fecha'];
            $producto = $quejas['producto'];
            $uMedida = $quejas['uMedida'];
            $caducado = $quejas['caducado'];
            $malSellado = $quejas['mal_sellado'];
            $presentacion = $quejas['presentacion'];
            $contaminado = $quejas['contaminado'];

            break;

    }
}


$consulta = $conexionBD->prepare("SELECT * FROM quejas");
$consulta->execute();
$listaQuejas = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>