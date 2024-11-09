<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #6F1427; 
        }

        .container {
            background-color: white; 
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .input {
            margin-bottom: 25px;
        }

        .input input {
            width: 100%;
            padding: 18px;
            border: 2px solid #6F1427; 
            border-radius: 10px;
            background-color: white; 
            color: black;
            font-size: 18px;
        }

        .botonS {
            background-color: #B12140; 
            color: white;
            padding: 18px;
            border: none;
            border-radius: 10px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .botonS:hover {
            background-color: #781127; 
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form" action="" method="POST">
            <div class="input">
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
            </div>
            <div class="input">
                <input type="password" name="contra" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="botonS">INICIAR SESIÓN</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "base_imc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $correo = $_POST['correo'];
            $contra = $_POST['contra'];

            $sql = "SELECT * FROM registrado WHERE correo='$correo' AND contra='$contra'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                header("Location: persona.php"); 
                exit();
            } else {
                echo "<p style='color: red;'>Correo o contraseña incorrectos</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
