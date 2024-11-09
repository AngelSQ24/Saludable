<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Base</title>
    <style>
        body {
            background-color: #6F1427;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container-wrapper {
            display: flex;
            gap: 20px;
        }
        .container {
            background-color: white;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #B12140;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }
        button:hover {
            background-color: #781127;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #B12140;
            color: white;
            font-weight: bold;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:last-child td {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .details {
            margin-top: 20px;
            text-align: left;
            background-color: #f7f7f7;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .details p {
            font-size: 16px;
            color: #333;
            margin: 8px 0;
        }
        .details p span {
            font-weight: bold;
            color: #B12140;
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <div class="container">
            <img src="gif/imagen2.gif" alt="Imagen en movimiento">
            <form method="GET">
                <input type="number" name="id" placeholder="Ingrese la ID que desea saber sus datos" required>
                <button type="submit">Mostrar Base</button>
            </form>
        </div>

        <div class="container">
            <?php
            if (isset($_GET['id'])) {
                $host = "localhost";
                $usuario = "root";
                $contrasena = "";
                $base_datos = "base_imc";

                $conn = mysqli_connect($host, $usuario, $contrasena, $base_datos);

                if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                }

                $id = $_GET['id'];
                $query = "SELECT * FROM plan_salud WHERE clavep_plan_salud = $id";
                $resultado = mysqli_query($conn, $query);

                if ($fila = mysqli_fetch_array($resultado)) {
                    echo "<h1>Datos del Plan de Salud</h1>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Dieta</th><th>Recomendaciones</th></tr>";
                    echo "<tr>";
                    echo "<td>" . $fila['clavep_plan_salud'] . "</td>";
                    echo "<td>" . $fila['dieta'] . "</td>";
                    echo "<td>" . $fila['recomendaciones'] . "</td>";
                    echo "</tr>";
                    echo "</table>";

                    echo "<div class='details'>";
                    echo "<p><span>ID: </span> " . $fila['clavep_plan_salud'] . "</p>";
                    echo "<p><span>Dieta: </span> " . $fila['dieta'] . "</p>";
                    echo "<p><span>Recomendaciones:<br></span> " . $fila['recomendaciones'] . "</p>";
                    echo "</div>";
                } else {
                    echo "<p>No se encontró un plan de salud con esa ID.</p>";
                }

                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>
</html>
