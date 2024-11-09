<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #6F1427; 
            font-family: Arial, sans-serif; 
        }
        .container {
            text-align: center;
            background-color: white; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
        }
        h1 {
            font-size: 48px; 
            margin: 0; 
        }
        p {
            font-size: 20px;
            margin: 10px 0; 
        }
        a {
            text-decoration: none; 
        }
        button {
            margin-top: 20px; 
            padding: 10px 20px; 
            font-size: 18px; 
            border: none; 
            border-radius: 5px; 
            background-color: #B12140; 
            color: white; 
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
        <h1>Bienvenido</h1>
        <p>Esta es la práctica final de Programación</p>
        <a href="login.php">
            <button>Entrar</button>
        </a>
    </div>
</body>
</html>
