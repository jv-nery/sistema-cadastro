<?php

$servidor = "localhost";
$usuario = "root";
$senha = "26092001@JvNery";
$banco = "sistema_cadastro";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

echo "Conexão realizada com sucesso!";
?>