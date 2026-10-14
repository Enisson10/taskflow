<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$id = $_GET['id'];

$sql = $pdo->prepare(
    "UPDATE tasks
     SET status = 'concluida'
     WHERE id = ? AND user_id = ?"
);

$sql->execute([
    $id,
    $_SESSION['user']
]);

header("Location: dashboard.php");
exit;
