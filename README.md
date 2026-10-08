# Sistema de Cadastro de Clientes

Sistema web desenvolvido para cadastro e gerenciamento de clientes, utilizando PHP e MySQL.

O projeto foi desenvolvido como prática dos fundamentos de desenvolvimento web, banco de dados e operações CRUD.

## Funcionalidades

* Cadastro de clientes
* Listagem de clientes
* Edição de clientes
* Exclusão de clientes
* Validação de nome
* Validação de e-mail
* Verificação de e-mail duplicado
* Validação de telefone
* Máscara para telefone
* Mensagens de sucesso e erro
* Confirmação antes da exclusão

## Tecnologias utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* JavaScript
* SQL

## Ferramentas

* Visual Studio Code
* XAMPP
* MySQL Workbench
* Git
* GitHub

## Banco de dados

O sistema utiliza um banco de dados MySQL chamado `sistema_cadastro`.

A principal tabela utilizada é:

```text
clientes
├── id
├── nome
├── email
└── telefone
```

## Estrutura do projeto

```text
sistema_cadastro/
├── index.php
├── cadastrar.php
├── editar.php
├── atualizar.php
├── excluir.php
├── conexao.php
├── config.php
├── style.css
├── .gitignore
└── README.md
```

> O arquivo `config.php` contém as configurações locais de acesso ao banco de dados e não é enviado para o GitHub.

## Como executar o projeto

1. Instale o XAMPP.
2. Inicie o Apache e o MySQL.
3. Crie o banco de dados `sistema_cadastro` no MySQL.
4. Crie a tabela `clientes`.
5. Configure os dados de conexão no arquivo `config.php`.
6. Coloque o projeto dentro da pasta `htdocs` do XAMPP.
7. Acesse no navegador:

```text
http://localhost/sistema_cadastro/
```

## Objetivo

Este projeto foi desenvolvido como parte do meu aprendizado em Análise e Desenvolvimento de Sistemas, com o objetivo de praticar PHP, MySQL, HTML, CSS, JavaScript, SQL e Git.

Também foi utilizado como primeiro projeto para praticar a publicação e organização de um projeto no GitHub.

## Próximos passos

* Melhorar a responsividade
* Adicionar novas validações
* Implementar novas funcionalidades
* Evoluir a interface
* Continuar aprimorando o projeto conforme o aprendizado
