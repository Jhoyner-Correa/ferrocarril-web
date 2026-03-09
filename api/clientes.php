<?php
// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Respuesta en JSON
header("Content-Type: application/json");

// Incluir conexión
include("../conexion.php");

// Verificar conexión
if (!$conn) {
    echo json_encode([
        "error" => "Error de conexión a la base de datos"
    ]);
    exit();
}

// Consulta
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

$datos = [];

if ($result) {
    while ($fila = $result->fetch_assoc()) {
        $datos[] = $fila;
    }

    echo json_encode([
        "success" => true,
        "data" => $datos
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => $conn->error
    ]);
}

$conn->close();
?>
