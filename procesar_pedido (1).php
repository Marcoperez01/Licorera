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

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$cedula = $_POST['cedula'];
$numero = $_POST['numero'];
$edad = $_POST['edad'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO Licores (nombre, apellido, direccion, cedula, numero, edad) VALUES ('$nombre', '$apellido', '$direccion', '$cedula', '$numero', '$edad')";

if ($conn->query($sql) === TRUE) {
    echo "Pedido realizado con éxito";
    echo $direccion;
    echo $cedula;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>