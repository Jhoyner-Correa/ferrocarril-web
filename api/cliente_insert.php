<?php
header("Content-Type: application/json; charset=UTF-8");
include("../conexion.php");

if (
    !isset($_POST["nombres"]) ||
    !isset($_POST["apellidos"]) ||
    !isset($_POST["direccion"]) ||
    !isset($_POST["telefono"])
) {
    echo json_encode([
        "success" => false,
        "message" => "Faltan datos"
    ]);
    exit;
}

$nombres = trim($_POST["nombres"]);
$apellidos = trim($_POST["apellidos"]);
$direccion = trim($_POST["direccion"]);
$telefono = trim($_POST["telefono"]);

$stmt = $conn->prepare("INSERT INTO clientes (nombres, apellidos, direccion, telefono) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombres, $apellidos, $direccion, $telefono);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Cliente registrado correctamente"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al registrar cliente"
    ]);
}

$stmt->close();
?>