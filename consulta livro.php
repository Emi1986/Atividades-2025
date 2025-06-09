<?php
// Configurações de conexão
$host = 'localhost';
$db   = 'biblioteca';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Conectar com PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Criar tabela e inserir dados se não existirem
$pdo->exec("
    CREATE TABLE IF NOT EXISTS livros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        autor VARCHAR(255),
        tema VARCHAR(100)
    )
");

// Verificar se a tabela está vazia e inserir dados
$stmtCheck = $pdo->query("SELECT COUNT(*) FROM livros");
if ($stmtCheck->fetchColumn() == 0) {
    $pdo->exec("
        INSERT INTO livros (titulo, autor, tema) VALUES
        ('Dom Casmurro', 'Machado de Assis', 'Literatura Brasileira'),
        ('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Fábula'),
        ('Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Fantasia'),
        ('Capitães da Areia', 'Jorge Amado', 'Literatura Brasileira'),
        ('O Senhor dos Anéis', 'J.R.R. Tolkien', 'Fantasia')
    ");
}

// Obter temas únicos para o formulário
$temas = $pdo->query("SELECT DISTINCT tema FROM livros")->fetchAll(PDO::FETCH_COLUMN);

// Inicializar variáveis
$livros = [];
$temaSelecionado = $_GET['tema'] ?? '';

if ($temaSelecionado) {
    $stmt = $pdo->prepare("SELECT * FROM livros WHERE tema = :tema");
    $stmt->execute(['tema' => $temaSelecionado]);
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Livros</title>
</head>
<body>
    <h1>Consulta de Livros por Tema</h1>

    <form method="GET">
        <label for="tema">Selecione um tema:</label>
        <select name="tema" id="tema">
            <option value="">-- Escolha --</option>
            <?php foreach ($temas as $tema): ?>
                <option value="<?= htmlspecialchars($tema) ?>" <?= $tema === $temaSelecionado ? 'selected' : '' ?>>
                    <?= htmlspecialchars($tema) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Consultar</button>
    </form>

    <?php if ($temaSelecionado): ?>
        <h2>Livros do tema: <?= htmlspecialchars($temaSelecionado) ?></h2>
        <?php if (count($livros) > 0): ?>
            <ul>
                <?php foreach ($livros as $livro): ?>
                    <li><strong><?= htmlspecialchars($livro['titulo']) ?></strong> - <?= htmlspecialchars($livro['autor']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum livro encontrado para este tema.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
