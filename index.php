<?php

require_once "conexao.php";

$mensagem = "";
$erro = "";

$nome = $_GET["nome"] ?? "";
$email = $_GET["email"] ?? "";
$telefone = $_GET["telefone"] ?? "";

if (isset($_GET["erro"])) {

    if ($_GET["erro"] === "nome") {
        $erro = "❌ O nome precisa ser preenchido.";
    }

    if ($_GET["erro"] === "email") {
        $erro = "❌ Digite um e-mail válido.";
    }

    if ($_GET["erro"] === "email_duplicado") {
        $erro = "❌ Este e-mail já está cadastrado.";
    }

    if ($_GET["erro"] === "telefone") {
        $erro = "❌ O telefone precisa ser preenchido.";
    }

    if ($_GET["erro"] === "telefone_invalido") {
        $erro = "❌ Digite um telefone válido.";
    }
}

$sql = "SELECT * FROM clientes ORDER BY id DESC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Sistema de Cadastro</title>

</head>

<body>

<div class="container">

      <div class="cabecalho">
        <span class="subtitulo">SISTEMA DE GESTÃO</span>
        <h1>Clientes</h1>
        <p>Gerencie seus clientes de forma simples e organizada.</p>
    </div>

    <?php if ($mensagem != ""): ?>

        <div class="mensagem sucesso">
            <?php echo $mensagem; ?>
        </div>

    <?php endif; ?>

    <?php if ($erro != ""): ?>

        <div class="mensagem erro">
            <?php echo $erro; ?>
        </div>

    <?php endif; ?>

    <div class="formulario">

    <h2>Novo cliente</h2>

    <p class="descricao-formulario">
        Preencha os dados abaixo para cadastrar um novo cliente.
    </p>

        <form action="cadastrar.php" method="POST">

            <label for="nome">Nome:</label>

            <input 
                type="text" 
                name="nome" 
                id="nome" 
                value="<?php echo htmlspecialchars($nome); ?>"
                required
            >

         

            <label for="email">E-mail:</label>

            <input 
                type="email" 
                name="email" 
                id="email" 
                value="<?php echo htmlspecialchars($email); ?>"
                required
            >

        

            <label for="telefone">Telefone:</label>

            <input 
                type="text" 
                name="telefone" 
                id="telefone"
                maxlength="15"
                inputmode="numeric"
                placeholder="(21) 99999-9999"
                value="<?php echo htmlspecialchars($telefone); ?>"
                required
            >

            

            <button type="submit">Cadastrar</button>

        </form>

    </div>

    <hr>

    <h2>Clientes cadastrados</h2>

<p class="descricao-tabela">
    Lista de clientes registrados no sistema.
</p>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>

        <?php while ($cliente = $resultado->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $cliente["id"]; ?></td>

                <td><?php echo $cliente["nome"]; ?></td>

                <td><?php echo $cliente["email"]; ?></td>

                <td><?php echo $cliente["telefone"]; ?></td>

                <td>
<a 
    class="botao-editar"
    href="editar.php?id=<?php echo $cliente["id"]; ?>"
>
    Editar
</a>

<a 
    class="botao-excluir"
    href="excluir.php?id=<?php echo $cliente["id"]; ?>"
    onclick="return confirm('Tem certeza que deseja excluir este cliente?');"
>
    Excluir
</a>

                </td>

            </tr>

        <?php } ?>

    </table>

</div>

<script>

setTimeout(function() {

    const mensagem = document.querySelector(".mensagem");

    if (mensagem) {
        mensagem.style.display = "none";
    }

}, 3000);

</script>

<script>

const telefone = document.getElementById("telefone");

telefone.addEventListener("input", function () {

    let valor = telefone.value.replace(/\D/g, "");

    if (valor.length > 11) {
        valor = valor.substring(0, 11);
    }

    if (valor.length <= 10) {

        if (valor.length > 6) {

            valor = valor.replace(
                /^(\d{2})(\d{4})(\d{0,4})/,
                "($1) $2-$3"
            );

        } else if (valor.length > 2) {

            valor = valor.replace(
                /^(\d{2})(\d{0,4})/,
                "($1) $2"
            );

        } else if (valor.length > 0) {

            valor = valor.replace(
                /^(\d{0,2})/,
                "($1"
            );
        }

    } else {

        if (valor.length > 7) {

            valor = valor.replace(
                /^(\d{2})(\d{5})(\d{0,4})/,
                "($1) $2-$3"
            );

        } else if (valor.length > 2) {

            valor = valor.replace(
                /^(\d{2})(\d{0,5})/,
                "($1) $2"
            );

        } else if (valor.length > 0) {

            valor = valor.replace(
                /^(\d{0,2})/,
                "($1"
            );
        }
    }

    telefone.value = valor;

});

</script>

</body>

</html>
```

