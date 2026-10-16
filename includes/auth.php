<?php

/**
 * Garante que existe um usuario logado.
 *
 * Inicia a sessao (se ainda nao estiver iniciada) e, caso nao exista
 * $_SESSION['user'], redireciona para a tela de login e encerra o script.
 *
 * Use no topo das paginas que ficam em pages/:
 *
 *     require_once __DIR__ . '/../includes/auth.php';
 *     requireLogin();
 *
 * O redirecionamento "login.php" e relativo a URL da pagina atual,
 * por isso esta funcao deve ser chamada apenas por arquivos de pages/.
 */
function requireLogin(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }
}
