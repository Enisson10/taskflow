<?php

session_start();

require '../config/database.php';

$id = $_GET['id'];

$sql = $pdo->prepare(
    "DELETE FROM tasks
     WHERE id=?"
);

$sql->execute([$id]);

header("Location: dashboard.php");
exit;
