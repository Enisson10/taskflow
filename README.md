# TaskFlow

Sistema de gerenciamento de tarefas desenvolvido em PHP e MySQL.

## Funcionalidades

- Cadastro de usuários
- Login e Logout
- Criação de tarefas
- Visualização de tarefas
- Edição de tarefas
- Exclusão de tarefas
- Conclusão de tarefas
- Perfil do usuário
- Sistema de autenticação com sessões
- Priorização de tarefas

## Tecnologias

- PHP
- MySQL
- HTML5
- CSS3
- PDO

## Estrutura do Projeto

```text
taskflow/
│
├── config/
│   └── database.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── pages/
│   ├── add_task.php
│   ├── complete_task.php
│   ├── dashboard.php
│   ├── delete_task.php
│   ├── edit_task.php
│   ├── login.php
│   ├── profile.php
│   └── register.php
│
├── assets/
│   └── style.css
│
├── index.php
├── logout.php
├── README.md
└── CHANGELOG.md
```

## Como Utilizar

1. Configure um servidor PHP.
2. Crie um banco de dados MySQL.
3. Ajuste os dados de conexão em:

```php
config/database.php
```

4. Execute o projeto.
5. Crie uma conta e comece a gerenciar suas tarefas.

## Roadmap

### Próximas melhorias

- Categorias de tarefas
- Pesquisa de tarefas
- Dashboard com gráficos
- Modo escuro
- Filtros por status
- Paginação de tarefas
- Upload de anexos

## Autor

**Enisson do Vale Franco**

Projeto desenvolvido para fins de estudo e portfólio.
