-- TaskFlow - estrutura do banco de dados
--
-- Como usar (MySQL / MariaDB):
--   mysql -u root -p < database.sql
-- ou importe este arquivo pelo phpMyAdmin.
--
-- O nome do banco (taskflow) deve ser o mesmo de config/database.php.

CREATE DATABASE IF NOT EXISTS taskflow
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE taskflow;

-- Usuarios: a senha guarda o hash gerado por password_hash() (register.php).
CREATE TABLE IF NOT EXISTS users (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(100) NOT NULL,
    email    VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tarefas: cada tarefa pertence a um usuario.
--   priority: baixa | media | alta  (add_task.php / edit_task.php)
--   status:   pendente | concluida  (complete_task.php grava 'concluida')
CREATE TABLE IF NOT EXISTS tasks (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT NOT NULL,
    title       VARCHAR(150) NOT NULL,
    description TEXT,
    priority    ENUM('baixa', 'media', 'alta') NOT NULL DEFAULT 'media',
    status      VARCHAR(20) NOT NULL DEFAULT 'pendente',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
