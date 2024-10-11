<?php
include 'config.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Senha sem criptografia para verificação

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verificar a senha usando password_verify()
        if (password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $user['id'];
            header('location: index.php');
            exit();
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Email não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <div class="Linha"></div>
        <form action="login.php" method="POST">
            <p class="p">E-mail:</p>
            <input type="email" name="email" id="email" required>
            <br><br>
            <p class="p">Digite sua senha:</p>
            <input type="password" name="senha" id="senha" required>
            <br>
            <button type="submit">Entrar</button>
            <div class="Linha"></div class="erro">
            <?php if (!empty($erro)): ?>
            <p style="color:red;"><?php echo $erro;?></p>
            <?php endif;?>
            <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
    </>
    
    </form>
    </div>
</body>

</html>