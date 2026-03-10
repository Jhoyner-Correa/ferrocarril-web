<?php

$host = "gondola.proxy.rlwy.net";
$user = "root";
$password = "GcBxfeRRcNmWTNMexApAgbFXCTzkFYIS";
$database = "ferrocarril";
$port = 40153;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Error de conexión");
}

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Panel Clientes - Ferrocarril</title>

<style>

body{
font-family: Arial;
background:#f4f6f9;
margin:0;
}

.header{
background:#4a3aff;
color:white;
padding:20px;
text-align:center;
font-size:24px;
}

.container{
width:90%;
margin:auto;
margin-top:30px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0px 5px 10px rgba(0,0,0,0.1);
}

th{
background:#4a3aff;
color:white;
padding:12px;
}

td{
padding:10px;
border-bottom:1px solid #ddd;
text-align:center;
}

tr:hover{
background:#f1f1f1;
}

</style>

</head>

<body>

<div class="header">
Panel de Clientes (Tiempo Real)
</div>

<div class="container">

<table>

<tr>
<th>ID</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dirección</th>
<th>Teléfono</th>
</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['id_cliente']."</td>";
echo "<td>".$row['nombres']."</td>";
echo "<td>".$row['apellidos']."</td>";
echo "<td>".$row['direccion']."</td>";
echo "<td>".$row['telefono']."</td>";

echo "</tr>";

}

}

?>

</table>

</div>

</body>
</html>