<?php
header("Content-Type: application/json; charset=UTF-8");
include("../conexion.php");

$sql = "SELECT * FROM clientes ORDER BY id_cliente ASC";
$result = $conn->query($sql);

$datos = [];

if ($result) {
    while ($fila = $result->fetch_assoc()) {
        $datos[] = $fila;
    }
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>