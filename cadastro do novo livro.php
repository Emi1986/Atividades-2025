<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = htmlspecialchars($_POST['titulo']);
    $autor = htmlspecialchars($_POST['autor']);
    $editora = htmlspecialchars($_POST['editora']);
    $publicacao = htmlspecialchars($_POST['publicacao']);

    // Validação básica
    if (empty($titulo) || empty($autor) || empty($editora) || empty($publicacao)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Salvar em um arquivo (pode ser adaptado para banco de dados)
    $linha = "$titulo | $autor | $editora | $publicacao" . PHP_EOL;
    file_put_contents("livros.txt", $linha, FILE_APPEND);

    echo "<h3>Livro cadastrado com sucesso!</h3>";
    echo "<a href='formulario_cadastro.php'>Cadastrar outro livro</a>";
} else {
    echo "Método de requisição inválido.";
}
?>



