<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require '../config/database.php';

$id = $_GET['id'];

$sql = $pdo->prepare(
    "DELETE FROM tasks
     WHERE id=? AND user_id=?"
);

$sql->execute([
    $id,
    $_SESSION['user']
]);

header("Location: dashboard.php");
exit;
