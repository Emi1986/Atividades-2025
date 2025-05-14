<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7e1e8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #f04c97;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .input-group {
            margin: 15px 0;
        }
        label {
            font-size: 1.2em;
            color: #333;
        }
        input[type="number"] {
            padding: 10px;
            width: 80%;
            margin-top: 10px;
            border: 2px solid #f04c97;
            border-radius: 5px;
            font-size: 1.1em;
            text-align: center;
        }
        button {
            background-color: #f04c97;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #e04687;
        }
        .resultado {
            margin-top: 20px;
            font-size: 1.3em;
            font-weight: bold;
            color: #f04c97;
        }
        .resultado span {
            font-weight: normal;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Calculadora de IMC</h1>
        <div class="input-group">
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" placeholder="Ex: 70" required>
        </div>
        <div class="input-group">
            <label for="altura">Altura (m):</label>
            <input type="number" step="0.01" id="altura" placeholder="Ex: 1.75" required>
        </div>
        <button onclick="calcularIMC()">Calcular IMC</button>
        <div class="resultado" id="resultado"></div>
    </div>

    <script>
        function calcularIMC() {
            var peso = parseFloat(document.getElementById("peso").value);
            var altura = parseFloat(document.getElementById("altura").value);

            if (isNaN(peso) || isNaN(altura) || peso <= 0 || altura <= 0) {
                document.getElementById("resultado").innerHTML = "Por favor, insira valores válidos!";
                return;
            }

            var imc = peso / (altura * altura);
            var categoria = "";

            if (imc < 18.5) {
                categoria = "Abaixo do peso";
            } else if (imc >= 18.5 && imc < 24.9) {
                categoria = "Peso normal";
            } else if (imc >= 25 && imc < 29.9) {
                categoria = "Sobrepeso";
            } else if (imc >= 30 && imc < 39.9) {
                categoria = "Obesidade";
            } else {
                categoria = "Obesidade grave";
            }

            document.getElementById("resultado").innerHTML = `Seu IMC é <span>${imc.toFixed(2)}</span> - Categoria: <span>${categoria}</span>`;
        }
    </script>

</body>
</html>
