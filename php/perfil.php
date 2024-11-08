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
    $caminho_foto = "";

    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK) {
        $arquivo_temp = $_FILES['foto_perfil']['tmp_name'];
        $nome_arquivo = basename($_FILES['foto_perfil']['name']);
        $diretorio_destino = 'uploads/'; // Crie uma pasta 'uploads' no mesmo diretório do perfil.php

        // Verifica se o diretório existe, se não existir cria
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0755, true);
        }

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivo_temp, $diretorio_destino . $nome_arquivo)) {
            $caminho_foto = $diretorio_destino . $nome_arquivo;
        } else {
            echo "Erro ao mover o arquivo.";
        }
    }

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

    if (!empty($caminho_foto)) {
        $stmt = $conn->prepare("UPDATE usuarios SET foto_perfil = ? WHERE id = ?");
        $stmt->bind_param("si", $caminho_foto, $usuario_id);
        $stmt->execute();
    }

    $mensagem = "Informações atualizadas com sucesso!";
}

// Obtém os dados do usuário (nome e email)
$stmt = $conn->prepare("SELECT foto_perfil, nome, email FROM usuarios WHERE id = ?");
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
  <script src="../js/perfil.js"></script>
</head>

<body>

  <header>
    <?php include 'navbar.php'; ?>
  </header>

  <div class="main-content">
    <div class="perfil-container">
      <h2>Meu Perfil</h2>

      <p>Nome: <?php echo htmlspecialchars($usuario['nome']); ?></p>

      <p>Foto de perfil:</p>
      <?php if (!empty($usuario['foto_perfil'])): ?>
      <img src="<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" id="foto_atual" alt="Foto de Perfil" id="preview">
      <?php else: ?>
      <p>Nenhuma foto de perfil disponível.</p>
      <?php endif; ?>

      <?php if (isset($mensagem)): ?>
      <p class="mensagem"><?php echo htmlspecialchars($mensagem); ?></p>
      <?php endif; ?>

        <div class="Linha"></div>

      <form action="perfil.php" method="POST" enctype="multipart/form-data">

        <label for="foto_perfil">Foto de Perfil:</label>
        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*" onchange="previewImage(event)">

        <br>

        <img src="#" alt="Preview da foto de perfil." id="preview" style="display: none;">

        <br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">

        <br><br>

        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" id="senha"
          placeholder="Digite a nova senha (deixe em branco para não alterar)">

        <br><br>

        <button type="submit" class="btn-atualizar">Atualizar</button>
        <br><br>

        <a href="logout.php" class="btn-logout-perfil">Sair</a>
      </form>

    </div>
  </div>
</body>

</html>