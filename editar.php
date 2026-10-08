```php
<?php

require_once "conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM clientes WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Editar Cliente</title>

</head>

<body>

<div class="container">

    <h1>Editar Cliente</h1>

    <div class="formulario">

        <form action="atualizar.php" method="POST">

            <input 
                type="hidden" 
                name="id" 
                value="<?php echo $cliente["id"]; ?>"
            >

            <label for="nome">Nome:</label>

            <input 
                type="text" 
                name="nome" 
                id="nome"
                value="<?php echo htmlspecialchars($cliente["nome"]); ?>"
                required
            >

            <label for="email">E-mail:</label>

            <input 
                type="email" 
                name="email" 
                id="email"
                value="<?php echo htmlspecialchars($cliente["email"]); ?>"
                required
            >

            <label for="telefone">Telefone:</label>

            <input 
                type="text" 
                name="telefone" 
                id="telefone"
                maxlength="15"
                inputmode="numeric"
                value="<?php echo htmlspecialchars($cliente["telefone"]); ?>"
                placeholder="(21) 99999-9999"
            >

            <button type="submit">
                Salvar alterações
            </button>

        </form>

    </div>

    <br>

    <a href="index.php">← Voltar para a lista</a>

</div>


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