<?php

require_once "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO clientes (nome, email, telefone)
        VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("sss", $nome, $email, $telefone);

$stmt->execute();

header("Location: index.php");
exit;

?>