<?php 

require_once 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novo_email = $_POST['email'] ?? '';
    $nova_senha = $_POST['senha'] ?? '';

    if (!empty($novo_email)) {
        $stmt = $conn->prepare("UPDATE usuarios SET email = ? WHERE id = ?");
        $stmt -> bind_param("si", $novo_email, $usuario_id);
        $stmt->execute();
    }

    if (!empty($nova_senha)) {
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
        $stmt -> bind_param("si", $senha_hash, $usuario_id);
        $stmt->execute();
    }

    $mensagem = "Informações atualizadas com sucesso!";
}

// Obtém os dados do usuário (nome e email)
$stmt = $conn->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>

<body>

    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <div class="main-content">
        <div class="perfil-container">
            <h2>Meu Perfil</h2>

            <p>Nome: <?php echo htmlspecialchars($usuario['nome']); ?></p>

            <?php if (isset($mensagem)): ?>
            <p class="mensagem"><?php echo htmlspecialchars($mensagem); ?></p>
            <?php endif; ?>

            <form action="perfil.php" method="POST">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">

                <br><br>

                <label for="senha">Nova Senha:</label>
                <input type="password" name="senha" id="senha"
                    placeholder="Digite a nova senha (deixe em branco para não alterar)">

                <br><br>

                <button type="submit" class="btn-atualizar">Atualizar</button>
                <br><br>

                <a href="logout.php" class="btn-logout">Sair</a>
            </form>


        </div>
    </div>
</body>

</html>