<?php
    // Variáveis iniciais
    $nome = $distancia = $combustivel = "";
    $resultado = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pegando os valores do formulário
        $nome = $_POST['nome'];
        $distancia = floatval($_POST['distancia']);
        $combustivel = floatval($_POST['combustivel']);

        // Validando os dados
        if (!empty($nome) && $distancia > 0 && $combustivel > 0) {
            // Calculando o consumo médio
            $consumoMedio = $distancia / $combustivel;

            // Classificando o consumo
            if ($consumoMedio <= 8) {
                $classificacao = "Auto consumo";
            } elseif ($consumoMedio <= 14) {
                $classificacao = "Consumo moderado";
            } else {
                $classificacao = "Bom consumo";
            }

            // Exibindo o resultado
            $resultado = "Olá {$nome}! Seu consumo médio foi de " . number_format($consumoMedio, 2) . " km/l. Classificação: {$classificacao}";
        } else {
            $resultado = "Por favor, preencha todos os campos corretamente.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Consumo de Combustível</title>
</head>
<body>
    <h1>Formulário de Consumo de Combustível</h1>
    <form method="POST" action="">
        <label for="nome">Nome do Condutor:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br><br>

        <label for="distancia">Distância Percorrida (km):</label><br>
        <input type="number" id="distancia" name="distancia" step="0.01" value="<?php echo htmlspecialchars($distancia); ?>"><br><br>

        <label for="combustivel">Combustível Gasto (litros):</label><br>
        <input type="number" id="combustivel" name="combustivel" step="0.01" value="<?php echo htmlspecialchars($combustivel); ?>"><br><br>

        <button type="submit">Calcular</button>
    </form>

    <h2><?php echo $resultado; ?></h2>
</body>
</html>
