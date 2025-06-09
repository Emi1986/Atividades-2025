<?php
// Configurações do banco de dados
$host = 'localhost';
$db   = 'biblioteca';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Criar a tabela, se ainda não existir
$pdo->exec("
    CREATE TABLE IF NOT EXISTS livros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        autor VARCHAR(255),
        tema VARCHAR(100)
    )
");

// Processamento do formulário
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $tema  = $_POST['tema'] ?? '';

    if ($titulo && $tema) {
        $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, tema) VALUES (:titulo, :autor, :tema)");
        $stmt->execute([
            'titulo' => $titulo,
            'autor'  => $autor,
            'tema'   => $tema
        ]);
        $mensagem = "Livro cadastrado com sucesso!";
    } else {
        $mensagem = "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>

    <?php if ($mensagem): ?>
        <p><strong><?= htmlspecialchars($mensagem) ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="titulo">Título:*</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor"><br><br>

        <label for="tema">Tema:*</label><br>
        <input type="text" id="tema" name="tema" required><br><br>

        <button type="submit">Cadastrar Livro</button>
    </form>
</body>
</html>
