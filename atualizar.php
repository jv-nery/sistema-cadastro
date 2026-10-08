<?php

require_once "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$sql = "UPDATE clientes
        SET nome = ?, email = ?, telefone = ?
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("sssi", $nome, $email, $telefone, $id);

$stmt->execute();

header("Location: index.php");
exit;

?>