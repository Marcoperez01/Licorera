<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "sql202.byethost33.com";
$username = "b33_35975583";
$password = "Ma3006774156.";
$dbname = "b33_35975583_estudiantes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener la cédula del formulario
$cedula = $_POST['cedula'];

// Preparar la consulta
$stmt = $conn->prepare("SELECT nombre, apellido, direccion, cedula, numero, edad FROM Licores WHERE cedula = ?");
$stmt->bind_param("i", $cedula);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar los datos
    while ($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row['nombre'] . "<br>";
        echo "Apellido: " . $row['apellido'] . "<br>";
        echo "Dirección: " . $row['direccion'] . "<br>";
        echo "Cédula: " . $row['cedula'] . "<br>";
        echo "Número: " . $row['numero'] . "<br>";
        echo "Edad: " . $row['edad'] . "<br>";
    }
} else {
    echo "No se encontraron resultados para la cédula ingresada.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
