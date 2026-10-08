```php
<?php

require_once "conexao.php";

$nome = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$telefone = trim($_POST["telefone"]);


if ($nome === "") {
    header(
        "Location: index.php?erro=nome&nome=" . urlencode($nome) .
        "&email=" . urlencode($email) .
        "&telefone=" . urlencode($telefone)
    );
    exit;
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header(
        "Location: index.php?erro=email&nome=" . urlencode($nome) .
        "&email=" . urlencode($email) .
        "&telefone=" . urlencode($telefone)
    );
    exit;
}


if ($telefone === "") {
    header(
        "Location: index.php?erro=telefone&nome=" . urlencode($nome) .
        "&email=" . urlencode($email) .
        "&telefone=" . urlencode($telefone)
    );
    exit;
}

$telefoneNumeros = preg_replace("/\D/", "", $telefone);

if (strlen($telefoneNumeros) !== 10 && strlen($telefoneNumeros) !== 11) {

    header(
        "Location: index.php?erro=telefone_invalido&nome=" . urlencode($nome) .
        "&email=" . urlencode($email) .
        "&telefone=" . urlencode($telefone)
    );

    exit;
}

$sql = "SELECT id FROM clientes WHERE email = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("s", $email);

$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {

    header(
        "Location: index.php?erro=email_duplicado&nome=" . urlencode($nome) .
        "&email=" . urlencode($email) .
        "&telefone=" . urlencode($telefone)
    );

    exit;
}

$sql = "INSERT INTO clientes (nome, email, telefone)
        VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("sss", $nome, $email, $telefone);

$stmt->execute();

header("Location: index.php?sucesso=cadastrado");
exit;

?>
```

<input 
    type="text" 
    name="nome" 
    id="nome" 
    value="<?php echo htmlspecialchars($nome); ?>"
    required
>
```

<input 
    type="email" 
    name="email" 
    id="email" 
    value="<?php echo htmlspecialchars($email); ?>"
    required
>
```

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
```