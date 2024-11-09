<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
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
        input {
            margin: 10px 0;
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #B12140;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #781127;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora IMC</h1>
        <form action="fin.php" method="POST">
            <input type="number" name="altura" id="altura" placeholder="Altura en cm" step="0.01" required>
            <input type="number" name="peso" id="peso" placeholder="Peso en kg" step="0.01" required>
            <button type="submit">Enviar datos de mi IMC</button>
        </form>
    </div>
</body>
</html>
