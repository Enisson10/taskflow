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
        }

        .card{
            background:white;
            padding:15px;
            margin-bottom:10px;
            border-radius:8px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
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

        add_task.php
            Nova Tarefa
        </a>

        <a href="logout.php" class="btn" style="background:#dc2626;">
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

            <span class="status">
                Status:
                <?= $task['status'] ?>
            </span>

        </div>

    <?php endforeach; ?>

</div>

</body>
</html>
