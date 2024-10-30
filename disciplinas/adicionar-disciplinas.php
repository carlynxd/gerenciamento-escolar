<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO disciplinas (nome) VALUES (:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome]);

    header('Location: menu.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Disciplina</title>
</head>

<body>
    <h1>Adicionar Disciplina</h1>

    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        <button type="submit">Salvar</button>
    </form>

    <a href="menu.php">Voltar</a>
</body>

</html>