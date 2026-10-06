<?php
session_start();

require '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = $pdo->prepare(
        "INSERT INTO tasks
        (user_id,title,description)
        VALUES(?,?,?)"
    );

    $sql->execute([
        $_SESSION['user'],
        $title,
        $description
    ]);

    header("Location: dashboard.php");
    exit;
}
?>

<h1>Nova Tarefa</h1>

<form method="POST">

<input
type="text"
name="title"
placeholder="Título">

<br><br>

<textarea
name="description"
placeholder="Descrição">
</textarea>

<br><br>

<button>
Salvar
</button>

</form>
