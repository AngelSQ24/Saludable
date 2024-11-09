<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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

        .signup {
            margin-top: 25px;
            font-size: 18px;
            color: black; 
        }

        .signup a {
            color: #6F1427; 
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_imc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_ape = $_POST['nom_ape'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    $sql = "SELECT MAX(id_persona) AS max_id FROM persona";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_persona2 = $row['max_id'];  

    $sql = "INSERT INTO registrado (nom_ape, correo, contra, id_persona2) 
            VALUES ('$nom_ape', '$correo', '$contra', '$id_persona2')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro guardado correctamente.');</script>";
        header("Location: loginRegist.php");
        exit(); 
    } else {
        echo "Error al guardar el registro: " . $conn->error;
    }
}

$conn->close();
?>


        <form class="form" action="" method="POST">
            <div class="input">
                <input type="text" name="nom_ape" placeholder="Nombre y Apellido" required>
            </div>
            <div class="input">
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
            </div>
            <div class="input">
                <input type="password" name="contra" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="botonS">REGISTRARSE</button>
            <p class="signup">¿Ya tienes una cuenta? <br><a href="loginRegist.php">Inicia sesión</a></p>
        </form>
    </div>
</body>
</html>
