<?php
header("Content-Type: application/json; charset=UTF-8");
include("../conexion.php");

if (!isset($_POST["id_cliente"])) {
    echo json_encode([
        "success" => false,
        "message" => "Falta el id del cliente"
    ]);
    exit;
}

$id_cliente = $_POST["id_cliente"];

$stmt = $conn->prepare("DELETE FROM clientes WHERE id_cliente = ?");
$stmt->bind_param("i", $id_cliente);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Cliente eliminado correctamente"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al eliminar cliente"
    ]);
}

$stmt->close();
?>