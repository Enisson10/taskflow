<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require_once("../config/database.php");

$sql = $pdo->prepare("SELECT * FROM tasks WHERE user_id=?");
$sql->execute([$_SESSION['user']]);
$tasks = $sql->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>TaskFlow Dashboard</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            margin:0;
            padding:20px;
        }

        .container{
            max-width:1000px;
            margin:auto;
        }

        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .btn{
            background:#2563eb;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
            margin-left:10px;
        }

        .btn-green{
            background:#16a34a;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

        .btn-yellow{
            background:#ca8a04;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

        .btn-red{
            background:#dc2626;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

        .card{
            background:white;
            padding:15px;
            margin-bottom:10px;
            border-radius:8px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
        }

        .actions{
            margin-top:15px;
        }

        .status{
            font-size:12px;
            color:gray;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">

        <h1>📋 TaskFlow</h1>

        <div>

            <a href="add_task.php" class="btn">
                Nova Tarefa
            </a>

            <a href="profile.php" class="btn">
                Perfil
            </a>

            <a href="../logout.php" class="btn" style="background:#dc2626;">
                Sair
            </a>

        </div>

    </div>

    <h2>Minhas Tarefas</h2>

    <?php foreach($tasks as $task): ?>

        <div class="card">

            <h3>
                <?= htmlspecialchars($task['title']) ?>
            </h3>

            <p>
                <?= htmlspecialchars($task['description']) ?>
            </p>

            <p>
                <strong>Prioridade:</strong>
                <?= htmlspecialchars($task['priority']) ?>
            </p>

            <p>
                <strong>Status:</strong>
                <?= htmlspecialchars($task['status']) ?>
            </p>

            <div class="actions">

                <a
                    href="edit_task.php?id=<?= $task['id'] ?>"
                    class="btn-yellow"
                >
                    Editar
                </a>

                <a
                    href="complete_task.php?id=<?= $task['id'] ?>"
                    class="btn-green"
                >
                    Concluir
                </a>

                <a
                    href="delete_task.php?id=<?= $task['id'] ?>"
                    class="btn-red"
                >
                    Excluir
                </a>

            </div>

        </div>

    <?php endforeach; ?>

</div>

</body>
</html>
