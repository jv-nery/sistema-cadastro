<?php

require_once "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM clientes WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: index.php");
exit;

?>