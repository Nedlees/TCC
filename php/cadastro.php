<?php
// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

$message = "";
$erro = "";

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Usando password_hash()

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
        exit();
    } else {
        echo "Erro ao cadastrar o usuário!";
    } 
    // Fechar a conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>

    <div class="signup-container">

        <h2>Cadastro de Usuário</h2>

        <div class="Linha"></div>

        <form action="cadastro.php" method="POST">

            <p class="p">Nome:</p>
            <input type="text" id="nome" name="nome" required>

            <br><br>

            <p class="p">E-mail:</p>
            <input type="email" id="email" name="email" required>

            <br><br>

            <p class="p">Senha:</p>
            <input type="password" id="senha" name="senha" required>

            <br><br>

            <div class="Linha"></div>

            <?php if (!empty($erro)): ?>
            <p class="erro"><?php echo $erro; ?></p>
            <?php endif; ?>

            <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>

            <button type="submit">Cadastrar</button>

            <p>Já tem uma conta? <a href="login.php">Entre agora</a></p>
            <br><br>

        </form>

    </div>

</body>

</html>