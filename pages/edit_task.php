<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$id = $_GET['id'];

$sql = $pdo->prepare(
    "SELECT * FROM tasks
     WHERE id=? AND user_id=?"
);

$sql->execute([
    $id,
    $_SESSION['user']
]);

$task = $sql->fetch();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $update = $pdo->prepare(
        "UPDATE tasks
         SET title=?, description=?, priority=?
         WHERE id=?"
    );

    $update->execute([
        $title,
        $description,
        $priority,
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
        value="<?= htmlspecialchars($task['title']); ?>"
        required
    >

    <br><br>

    <textarea
        name="description"
        required
    ><?= htmlspecialchars($task['description']); ?></textarea>

    <br><br>

    <label>Prioridade:</label>

    <select name="priority">

        <option
            value="baixa"
            <?= $task['priority'] == 'baixa' ? 'selected' : ''; ?>
        >
            Baixa
        </option>

        <option
            value="media"
            <?= $task['priority'] == 'media' ? 'selected' : ''; ?>
        >
            Média
        </option>

        <option
            value="alta"
            <?= $task['priority'] == 'alta' ? 'selected' : ''; ?>
