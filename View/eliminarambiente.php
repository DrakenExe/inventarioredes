<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "applabruno";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM ambiente WHERE idambiente = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado con éxito";
        header("Location: administrador.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

$conn->close();
?>
