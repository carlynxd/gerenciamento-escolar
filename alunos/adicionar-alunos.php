<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO alunos (nome, email, idade) VALUES (:nome, :email, :idade)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'idade' => $idade]);

    header('Location: menu.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
</head>

<body>
    <h1>Adicionar Aluno</h1>

    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Idade: <input type="number" name="idade" required><br><br>
        <button type="submit">Salvar</button>
    </form>

    <a href="menu.php">Voltar</a>
</body>

</html>