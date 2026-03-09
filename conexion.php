<?php

$host = "gondola.proxy.rlwy.net";
$user = "root";
$password = "GcBxfeRRcNmWTNMexApAgbFXCTzkFYIS";
$database = "ferrocarril";
$port = 40153;

$conn = new mysqli($host,$user,$password,$database,$port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>