<?php
//conexion a la base de datos 
$host='localhost';
$user='root';
$password = '';
$dbname = 'ecolacc';
//comrobacion de la conexion
try {
    $conexion = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $password);
    $conexion->exec("SET NAMES utf8");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>