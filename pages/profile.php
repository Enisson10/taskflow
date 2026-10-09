<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
?>

<h1>Meu Perfil</h1>

<p>Bem-vindo ao TaskFlow.</p>

<p>Usuário autenticado com sucesso.</p>
