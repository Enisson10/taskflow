<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$sql = $pdo->prepare(
    "SELECT * FROM tasks
     WHERE user_id=?"
);

$sql->execute([
    $_SESSION['user']
]);

$tasks = $sql->fetchAll();
?>

<h1>Dashboard</h1>

<p>
add_task.php
Nova tarefa
</a>
</p>

<?php foreach($tasks as $task): ?>

<div>

<h3>
<?= $task['title']; ?>
</h3>

<p>
<?= $task['description']; ?>
</p>

<p>
Status:
<?= $task['status']; ?>
</p>
<p>
complete_task.php?id=<?= $task['id']; ?>
Concluir
</a>
</p>

<p>
edit_task.php?id=<?= $task['id']; ?>
Editar
</a>
</p>

<p>
delete_task.php?id=<?= $task['id']; ?>
Excluir
</a>
</p>
</div>

<hr>

<?php endforeach; ?>
