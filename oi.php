<h1>Minha Primeira Aula de PHP</h1>
<?php
// Exibindo uma mensagem na tela
echo "Olá Mundo";

// comentário de uma linha
# comentário de uma linha
/*
   Comentário de mútiplas linhas
   Aqui você pode escrever várias linhas de comentários 
   sem se preocupar com limite de uma linha.
*/

// Variáveis iniciam com cifrão ($)
$nome = "Emilly"; //String
$idade = 17; // Inteiro 
$altura = 1,64; // Float
$peso = 45.0; // Float
$casado = false; // Booleano (true ou false)
$filhos = null; // Nulo (sem valor definido)

<?php
// Exibindo uma mensagem na tela
echo "Normal: $nome <br>";
echo "Idade: $idade <br>";
echo "Altura: $altura <br>"
echo "Peso: $peso <br>";

?>


// calculando o IMC
function calcularIMC($peso, $altura) {
    if ($altura <= 0) {
        return "Altura inválida!";
    }
    $imc = $peso / ($altura * $altura);
    return number_format($imc, 2, '.', '');
}

$resultadoIMC = "";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = isset($_POST['peso']) ? $_POST['peso'] : 0;
    $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;

    if ($peso && $altura) {
        $resultadoIMC = calcularIMC($peso, $altura);

        // Determinar a faixa de IMC
        if ($resultadoIMC < 18.5) {
            $mensagem = "Abaixo do peso.";
        } elseif ($resultadoIMC >= 18.5 && $resultadoIMC < 24.9) {
            $mensagem = "Peso normal.";
        } elseif ($resultadoIMC >= 25 && $resultadoIMC < 29.9) {
            $mensagem = "Sobrepeso.";
        } else {
            $mensagem = "Obesidade.";
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos!";
    }
}


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>
        <form method="POST" action="">
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" required step="any" placeholder="Informe seu peso" value="<?= isset($peso) ? $peso : '' ?>">

            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" name="altura" required step="any" placeholder="Informe sua altura" value="<?= isset($altura) ? $altura : '' ?>">

            <button type="submit">Calcular</button>
        </form>

        <?php if ($resultadoIMC): ?>
            <h2>Resultado do IMC: <?= $resultadoIMC ?></h2>
            <p><strong>Classificação:</strong> <?= $mensagem ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
