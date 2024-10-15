<?php
session_start();

// Si ya hay una sesión activa, redirige al usuario a la página principal
if (isset($_SESSION["id"])) {
    header("Location: /EcolacBase/index.php");
    exit();
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecolac";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Escapa las variables del formulario para prevenir inyección SQL
    $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
    $contrasenia = mysqli_real_escape_string($conn, $_POST["contrasenia"]);

    // Consulta para verificar la información de inicio de sesión y obtener el tipo de usuario
    $sql = "SELECT u.id, u.nombres, u.usuario, u.contrasenia, c.descripcion AS tipo
            FROM usuarios u
            JOIN cargo c ON u.id_cargo = c.id
            WHERE u.usuario = '$usuario' AND u.contrasenia = '$contrasenia'";

    $result = $conn->query($sql);

    // Verificar si se encontraron coincidencias
    if ($result && $result->num_rows > 0) {
        // Inicio de sesión exitoso
        $row = $result->fetch_assoc();
        $tipoUsuario = $row["tipo"];

        // Guardar los datos en la sesión
        $_SESSION["id_usuario"] = $row["id"];
        $_SESSION["nombre_usuario"] = $row["nombres"];
        $_SESSION["tipo_usuario"] = $tipoUsuario;

        // Redirige según el tipo de usuario
        if ($tipoUsuario == "cliente") {
            header("Location: /EcolacBase/secciones/index.php");
            exit();
        } elseif ($tipoUsuario == "Administrador") {
            header("Location: /EcolacBase/admin/indexAdmin.php");
            exit();
        } else {
            header("Location: /EcolacBase/acceso_denegado.php");
            exit();
        }

    } else {
        // Si no se encontraron coincidencias, mostrar mensaje de error
        ob_start();
        echo "Inicio de sesión fallido. Verifique sus credenciales.";
        ob_end_flush();
        $conn->close();
        header("Location: /EcolacBase/index.php");
        exit();
    }
} else {
    // Si el formulario no ha sido enviado, verifica si no hay una sesión activa
    if (!isset($_SESSION["id"])) {
        header("Location: /EcolacBase/index.php");
        exit();
    }
}

$conn->close();
?>
