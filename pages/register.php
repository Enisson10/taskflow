<?php
require '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql = $pdo->prepare(
        "INSERT INTO users(name,email,password)
        VALUES(?,?,?)"
    );

    $sql->execute([
        $name,
        $email,
        $password
    ]);

    header("Location: login.php");
    exit;
}
?>

<h2>Cadastro</h2>

<form method="POST">

<input
type="text"
name="name"
placeholder="Nome"
required>

<br><br>

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input
type="password"
name="password"
placeholder="Senha"
required>

<br><br>

<button type="submit">
Cadastrar
</button>

</form>

<p>
login.phpJá tenho conta</a>
</p>
