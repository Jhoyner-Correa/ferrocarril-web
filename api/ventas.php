<?php

header("Content-Type: application/json");
include("../conexion.php");

$sql = "SELECT * FROM ventas";
$result = $conn->query($sql);

$datos = [];

while($fila = $result->fetch_assoc()){
    $datos[] = $fila;
}

echo json_encode($datos);

?>