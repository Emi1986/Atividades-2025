<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Combustível</title>
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #d63384;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #a61e4d;
            font-weight: bold;
            text-align: left;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #f7c1d9;
            border-radius: 8px;
            background-color: #fff;
        }

        input[type="submit"] {
            margin-top: 25px;
            background-color: #ff66b2;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #e055a1;
        }

        .resultado {
            margin-top: 25px;
            background-color: #ffe0ec;
            padding: 15px;
            border-radius: 10px;
            color: #b30059;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Combustível</h2>
        <form method="post">
            <label for="etanol">Preço do Etanol (R$):</label>
            <input type="number" step="0.01" name="etanol" id="etanol" required>

            <label for="gasolina">Preço da Gasolina (R$):</label>
            <input type="number" step="0.01" name="gasolina" id="gasolina" required>

            <input type="submit" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $etanol = floatval($_POST["etanol"]);
            $gasolina = floatval($_POST["gasolina"]);

            $gasolina70 = $gasolina * 0.7;

            echo "<div class='resultado'>";
            echo "🔹 70% do preço da gasolina: R$ " . number_format($gasolina70, 2, ',', '.') . "<br>";
            echo "🔹 Preço do etanol: R$ " . number_format($etanol, 2, ',', '.') . "<br><br>";

            if ($etanol < $gasolina70) {
                echo "💡 <strong>É mais vantajoso abastecer com <span style='color:#d63384;'>Etanol</span>.</strong>";
            } elseif ($etanol > $gasolina70) {
                echo "💡 <strong>É mais vantajoso abastecer com <span style='color:#d63384;'>Gasolina</span>.</strong>";
            } else {
                echo "💡 <strong>Ambos os combustíveis têm custo-benefício semelhante.</strong>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
