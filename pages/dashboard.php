<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$sql = $pdo->prepare("
    SELECT * FROM tasks
    WHERE user_id=?
    ORDER BY id DESC
");

$sql->execute([
    $_SESSION['user']
]);

$tasks = $sql->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - TaskFlow</title>
    ../assets/style.css
</head>
<body>

<h1>Minhas Tarefas</h1>

<p>
    add_task.php➕ Nova tarefa</a> |
    profile.php👤 Perfil</a> |
    ../logout.php🚪 Sair</a>
</p>

<hr>

<?php if (count($tasks) > 0): ?>

    <ul>

    <?php foreach ($tasks as $task): ?>

        <li>

            <h3>
                <?php echo htmlspecialchars($task['title']); ?>
            </h3>

            <p>
                <?php echo htmlspecialchars($task['description']); ?>
            </p>

            <p>
                <strong>Status:</strong>

                <?php if ($task['status'] == 'concluida'): ?>
                    ✅ Concluída
                <?php else: ?>
                    ⏳ Pendente
                <?php endif; ?>
            </p>

            <p>
                <strong>Prioridade:</strong>

                <?php if ($task['priority'] == 'alta'): ?>

                    <span style="color:red;">
                        🔴 Alta
                    </span>

                <?php elseif ($task['priority'] == 'media'): ?>

                    <span style="color:orange;">
                        🟠 Média
                    </span>

                <?php else: ?>

                    <span style="color:green;">
                        🟢 Baixa
                    </span>

                <?php endif; ?>

            </p>

            <p>
                complete_task.php?id=<?php echo $task['id']; ?>
                    Concluir
                </a>
                |
                edit_task.php?id=<?php echo $task['id']; ?>
                    Editar
                </a>
                |
                delete_task.php?id=<?php echo $task['id']; ?>
                    Excluir
                </a>
            </p>

            <hr>

        </li>

    <?php endforeach; ?>

    </ul>

<?php else: ?>

    <p>Nenhuma tarefa cadastrada.</p>

<?php endif; ?>

</body>
</html>
