<?php
session_start();

require '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $pdo->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $sql->execute([$email]);

    $user = $sql->fetch();

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    }

    echo "Login inválido";
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>
