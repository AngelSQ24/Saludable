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
    $peso = $_POST['peso'];
    $altura = $_POST['altura'] / 100;  
    $imc = $peso / ($altura * $altura);  

    $sql = "SELECT MAX(id_persona) AS max_id FROM persona";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_persona1 = $row['max_id']; 

    $sql = "INSERT INTO imc (peso, altura, cal_imc, id_persona1) 
            VALUES ('$peso', '$altura', '$imc', '$id_persona1')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Datos guardados correctamente.');</script>";
        header("Location: fin.php?imc=$imc");
        exit(); 
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6F1427;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        img {
            margin-top: 20px;
            max-width: 50%; 
            height: auto;
        }
        
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #B12140;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center; 
            display: block; 
            width: 200px; 
            margin-left: auto;
            margin-right: auto; 
        }
        .button:hover {
            background-color: #781127;
        }
        .bajo-peso {
            color: #FFA07A; 
            font-weight: bold;
        }
        .peso-normal {
            color: #4CAF50; 
            font-weight: bold;
        }
        .sobrepeso {
            color: #FFFF00; 
            font-weight: bold;
        }
        .obesidad {
            color: #FF4500; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado de tu IMC</h1>
        <p id="resultado"></p>
        <p id="mensaje" class="mensaje"></p>
        <img src="imagen1.gif" alt="Imagen descriptiva">
        
        <a href="bienvenido.php" class="button" id="redirectButton" style="display: none;">Terminar y regresar</a>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const imc = parseFloat(urlParams.get('imc'));

        document.getElementById('resultado').innerText = `Tu IMC es: ${imc}`;

        let mensaje;
        let className;
        if (imc < 18.5) {
            mensaje = "Tienes un peso bajo. Es recomendable que consultes a un profesional de la salud.";
            className = "bajo-peso";
        } else if (imc >= 18.5 && imc < 24.9) {
            mensaje = "Tu peso es normal. ¡Sigue así!";
            className = "peso-normal";
        } else if (imc >= 25 && imc < 29.9) {
            mensaje = "Tienes sobrepeso. Considera mejorar tu alimentación y aumentar tu actividad física.";
            className = "sobrepeso";
        } else {
            mensaje = "Tienes obesidad. Es importante que consultes a un profesional de la salud para un plan adecuado.";
            className = "obesidad";
        }

        const mensajeElement = document.getElementById('mensaje');
        mensajeElement.innerText = mensaje;
        mensajeElement.classList.add(className); 

        document.getElementById('redirectButton').style.display = 'block'; 
    </script>
</body>
</html>
