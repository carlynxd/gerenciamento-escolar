<?php
include '../includes/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM disciplinas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header('Location: menu.php');
    exit();
} else {
    header('Location: menu.php');
    exit();
}
?>
