<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

   $sql = $pdo->prepare(
    "INSERT INTO tasks
    (user_id, title, description, priority)
    VALUES (?, ?, ?, ?)"
);

$sql->execute([
    $_SESSION['user'],
    $title,
    $description,
    $priority
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
        placeholder="Título"
        required>

    <br><br>

    <textarea
        name="description"
        placeholder="Descrição"></textarea>

    <br><br>

    <label>Prioridade:</label>

    <select name="priority">
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>
