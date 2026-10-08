<?php

session_start();

require '../config/database.php';

$id = $_GET['id'];

$sql = $pdo->prepare(
    "SELECT * FROM tasks WHERE id=?"
);

$sql->execute([$id]);

$task = $sql->fetch();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $update = $pdo->prepare(
        "UPDATE tasks
         SET title=?, description=?
         WHERE id=?"
    );

    $update->execute([
        $title,
        $description,
        $id
    ]);

    header("Location: dashboard.php");
    exit;
}
?>

<h1>Editar Tarefa</h1>

<form method="POST">

<input
type="text"
name="title"
value="<?= $task['title']; ?>">

<br><br>

<textarea
name="description"><?= $task['description']; ?></textarea>

<br><br>

<button>
Atualizar
</button>

</form>
