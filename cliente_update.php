<?php
header("Content-Type: application/json; charset=UTF-8");
include("../conexion.php");

if (
    !isset($_POST["id_cliente"]) ||
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

$id_cliente = $_POST["id_cliente"];
$nombres = trim($_POST["nombres"]);
$apellidos = trim($_POST["apellidos"]);
$direccion = trim($_POST["direccion"]);
$telefono = trim($_POST["telefono"]);

$stmt = $conn->prepare("UPDATE clientes SET nombres = ?, apellidos = ?, direccion = ?, telefono = ? WHERE id_cliente = ?");
$stmt->bind_param("ssssi", $nombres, $apellidos, $direccion, $telefono, $id_cliente);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Cliente actualizado correctamente"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al actualizar cliente"
    ]);
}

$stmt->close();
?>