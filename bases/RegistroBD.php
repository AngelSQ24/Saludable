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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .container.img-form {
            width: 400px; 
        }
        .container.table-container {
            width: 600px; 
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
        <div class="container img-form">
            <img src="gif/imagen6.gif" alt="Imagen en movimiento">
            <form method="GET">
                <input type="number" name="id" placeholder="Ingrese la ID que desea saber sus datos" required>
                <button type="submit">Mostrar Base</button>
            </form>
        </div>

        <div class="container table-container">
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
                $query = "SELECT * FROM registrado WHERE id_us = $id";
                $resultado = mysqli_query($conn, $query);

                if ($fila = mysqli_fetch_array($resultado)) {
                    echo "<h1>Datos del Registro</h1>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nombre Completo</th><th>Correo</th><th>Contraseña</th><th>Clave Persona</th></tr>";
                    echo "<tr>";
                    echo "<td>" . $fila['id_us'] . "</td>";
                    echo "<td>" . $fila['nom_ape'] . "</td>";
                    echo "<td>" . $fila['correo'] . "</td>";
                    echo "<td>" . $fila['contra'] . "</td>";
                    echo "<td>" . $fila['id_persona2'] . "</td>";
                    echo "</tr>";
                    echo "</table>";

                    echo "<div class='details'>";
                    echo "<p><span>ID: </span> " . $fila['id_us'] . "</p>";
                    echo "<p><span>Nombre Completo: </span> " . $fila['nom_ape'] . "</p>";
                    echo "<p><span>Correo: </span> " . $fila['correo'] . "</p>";
                    echo "<p><span>Contraseña: </span> " . $fila['contra'] . "</p>";
                    echo "<p><span>Clave Persona: </span> " . $fila['id_persona2'] . "</p>";
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
