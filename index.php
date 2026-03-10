<?php

$host = "gondola.proxy.rlwy.net";
$user = "root";
$password = "GcBxfeRRcNmWTNMexApAgbFXCTzkFYIS";
$database = "ferrocarril";
$port = 40153;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$sql = "SELECT * FROM clientes ORDER BY id_cliente ASC";
$result = $conn->query($sql);

$totalClientes = 0;
if ($result) {
    $totalClientes = $result->num_rows;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Clientes - Ferrocarril</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body{
            background: #121212;
            color: #ffffff;
        }

        .header{
            background: linear-gradient(135deg, #1a1a1a, #242424);
            border-bottom: 2px solid #D4AF37;
            padding: 28px 20px;
            text-align: center;
            box-shadow: 0 4px 14px rgba(0,0,0,0.35);
        }

        .header h1{
            color: #D4AF37;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .header p{
            color: #d9d9d9;
            font-size: 15px;
        }

        .container{
            width: 92%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .cards{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .card{
            background: #1a1a1a;
            border: 1px solid #D4AF37;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.28);
        }

        .card h3{
            color: #D4AF37;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card .value{
            font-size: 34px;
            font-weight: bold;
            color: #ffffff;
        }

        .panel{
            background: #1a1a1a;
            border: 1px solid #8C6B1F;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.30);
        }

        .panel-title{
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .panel-title h2{
            color: #D4AF37;
            font-size: 24px;
        }

        .btn-refresh{
            background: #D4AF37;
            color: #121212;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .btn-refresh:hover{
            opacity: 0.88;
        }

        .table-wrap{
            overflow-x: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead th{
            background: #D4AF37;
            color: #121212;
            padding: 14px 12px;
            text-align: center;
            font-size: 15px;
        }

        tbody td{
            background: #242424;
            color: #f3f3f3;
            padding: 14px 12px;
            text-align: center;
            border-bottom: 1px solid #3a3a3a;
        }

        tbody tr:hover td{
            background: #2d2d2d;
        }

        .badge{
            display: inline-block;
            background: #2b2b2b;
            border: 1px solid #D4AF37;
            color: #D4AF37;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .footer{
            text-align: center;
            color: #bdbdbd;
            padding: 24px 12px 32px;
            font-size: 14px;
        }

        .empty{
            text-align: center;
            padding: 35px 15px;
            color: #d9d9d9;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>CRUD-CLIENTES</h1>
        <p>DATOS EN TIEMPO REAL CON EL APK DE ANDROID</p>
    </div>

    <div class="container">

        <div class="cards">
            <div class="card">
                <h3>Total de clientes</h3>
                <div class="value"><?php echo $totalClientes; ?></div>
            </div>

            <div class="card">
                <h3>Estado del servidor</h3>
                <div class="value" style="font-size:20px;">
                    <span class="badge">EN LÍNEA</span>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title">
                <h2>Listado de clientes</h2>
                <a class="btn-refresh" href="">Actualizar</a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id_cliente']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nombres']); ?></td>
                                    <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
                                    <td><?php echo htmlspecialchars($row['direccion']); ?></td>
                                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="empty">No hay clientes registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="footer">
        Proyecto Android  + MySQL | JHOYNER CORREA HINOSTROZA
    </div>

</body>
</html>