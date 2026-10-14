<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$sql = $pdo->prepare(
    "SELECT * FROM users WHERE id=?"
);

$sql->execute([
    $_SESSION['user']
]);

$user = $sql->fetch();

?>

<h1>Meu Perfil</h1>

<p>
    <strong>Nome:</strong>
    <?= htmlspecialchars($user['name']); ?>
</p>

<p>
    <strong>Email:</strong>
    <?= htmlspecialchars($user['email']); ?>
</p>

<p>
    Usuário autenticado com sucesso.
</p>

<p>
    <a href="dashboard.php">
        Voltar ao Dashboard
    </a>
</p>
