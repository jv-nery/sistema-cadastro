```php
<?php

require_once "conexao.php";

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

    <h1>Cadastro de Clientes</h1>

    <div class="formulario">

        <form action="cadastrar.php" method="POST">

            <label for="nome">Nome:</label>

            <input 
                type="text" 
                name="nome" 
                id="nome" 
                required
            >

            <br><br>

            <label for="email">E-mail:</label>

            <input 
                type="email" 
                name="email" 
                id="email" 
                required
            >

            <br><br>

            <label for="telefone">Telefone:</label>

            <input 
                type="text" 
                name="telefone" 
                id="telefone"
                maxlength="15"
                inputmode="numeric"
                placeholder="(21) 99999-9999"
            >

            <br><br>

            <button type="submit">Cadastrar</button>

        </form>

    </div>

    <hr>

    <h2>Clientes cadastrados</h2>

    <table border="1">

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

                    <a href="editar.php?id=<?php echo $cliente["id"]; ?>">
                        Editar
                    </a>

                    |

                    <a 
                        class="excluir" 
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
