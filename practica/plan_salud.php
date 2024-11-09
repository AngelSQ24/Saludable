<?php
$cn = new mysqli("localhost", "root", "", "base_imc");

if($cn->connect_errno == 0) {
    $mensaje = "Conexión exitosa. ";

    if(isset($_POST['dieta']) && isset($_POST['recomendaciones'])) {
        $dieta = $_POST['dieta'];
        $recomendaciones = $_POST['recomendaciones'];

        $insertar = $cn->query("INSERT INTO plan_salud VALUES (0, '".$dieta."', '".$recomendaciones."')");

        if($insertar) {
            echo "<script>
                alert('Datos guardados exitosamente');
                window.location.href = 'persona.php';
            </script>";
        } else {
            echo "<script>alert('No se guardó el registro. Error: " . $cn->error . "');</script>";
        }

    } else {
        echo "<script>alert('Faltan datos en el formulario.');</script>";
    }

    $cn->close();

} else {
    echo "<script>alert('Fallo la conexión. Error: " . $cn->connect_errno . "');</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de Salud</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #6F1427;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #B12140;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #781127;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>1.- Añadir al Plan de Salud</h2>
        <form action="" method="post">
            <label for="dieta">Dieta:</label>
            <input type="text" id="dieta" name="dieta" required>

            <label for="recomendaciones">Recomendaciones:</label>
            <input type="text" id="recomendaciones" name="recomendaciones" required>

            <input type="submit" value="Enviar el Plan de Salud">
        </form>
    </div>
</body>
</html>
