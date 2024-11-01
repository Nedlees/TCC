<?php

require_once 'config.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] === 'null') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];
    $sexo = $_POST['sexo'];
    $contato = $_POST['contato'];
    $usuario_id = $_SESSION['usuario_id'];

    $contato = preg_replace('/\D/', '', $contato); // Remove caracteres não numéricos
    if (strlen($contato) === 11) { // Se o número tiver 11 dígitos (com DDD)
        $contato = sprintf("(%s) %s-%s", substr($contato, 0, 2), substr($contato, 2, 5), substr($contato, 7, 4));
    } elseif (strlen($contato) === 10) { // Se o número tiver 10 dígitos
        $contato = sprintf("(%s) %s-%s", substr($contato, 0, 2), substr($contato, 2, 4), substr($contato, 6, 4));
    }
    
    // Configura o diretório de destino para as imagens
    $targetDir = 'imagens/';
    $targetFile = $targetDir . basename($_FILES['imagem']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verifica se o arquivo é uma imagem
    $check = getimagesize($_FILES['imagem']['tmp_name']);
    if ($check === false) {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($targetFile)) {
        echo "O arquivo já existe.";
        $uploadOk = 0;
    }

    // Limita o tamanho do arquivo (5MB neste exemplo)
    if ($_FILES['imagem']['size'] > 5000000) {
        echo "O arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Limita os tipos de arquivos permitidos
    if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
        echo "Somente arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk está definido como 0 devido a um erro
    if ($uploadOk == 0) {
        echo "O arquivo não foi enviado.";
    } else {
        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
            echo "O arquivo ". htmlspecialchars(basename($_FILES['imagem']['name'])). " foi enviado com sucesso.";
            
            // Insere os dados no banco de dados
            $stmt = $pdo->prepare("INSERT INTO animais (nome, tipo, idade, descricao, imagem, sexo, contato, usuario_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $tipo, $idade, $descricao, $targetFile, $sexo, $contato, $usuario_id]);

            // Redireciona para a página de adoção
            header('Location: adocao.php');
            exit();
        } else {
            echo "Houve um erro ao enviar o arquivo.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Pets para Adoção</title>
  <link rel="stylesheet" href="../css/cadastro_pet.css">
  <script>
  function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (telefone.length > 6) {
      return `(${telefone.substring(0, 2)}) ${telefone.substring(2, 7)}-${telefone.substring(7, 11)}`;
    } else if (telefone.length > 2) {
      return `(${telefone.substring(0, 2)}) ${telefone.substring(2)}`;
    } else {
      return telefone;
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('imagem').addEventListener('change', function(event) {
      const file = event.target.files[0];
      const preview = document.getElementById('image-preview');
      const previewContainer = document.getElementById('image-preview-container');

      if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
          preview.src = e.target.result;
          previewContainer.style.display = 'block';
          preview.style.display = 'block';
        }

        reader.readAsDataURL(file);
      } else {
        previewContainer.style.display = 'none';
        preview.style.display = 'none';
      }
    });

    const contatoInput = document.getElementById("contato");
    contatoInput.addEventListener("input", function() {
      const formatted = formatarTelefone(this.value);
      this.value = formatted; // Atualiza o valor do campo com a formatação
    });
  });
  </script>
</head>

<body>

  <header>
    <?php include 'navbar.php' ?>
  </header>

  <a href="adocao.php" class="back">Voltar</a>

  <h1 id="infobanner">Colocar Pet para Adoção</h1>

  <section id="container-form">

    <div class="add-animal-container">

      <section class="add-animal">
        <h2>Informações do Pet</h2>

        <form action="cadastro_animal.php" method="POST" enctype="multipart/form-data" class="cadastro">

          <label for="imagem">Imagem do Pet:</label>
          <input type="file" name="imagem" id="imagem" required>

          <div id="image-preview-container" style="display: none;">
            <img src="" alt="Pré visualização da imagem" id="image-preview" style="max-width: 100%; max-height: 200px;">
          </div>

          <br><br>

          <label for="nome"><b>Nome do Pet:</b></label>
          <input type="text" id="nome" name="nome" placeholder="Digite o nome do pet" required>

          <br><br>

          <label for="tipo"><b>Tipo do Pet:</b></label>
          <input type="text" name="tipo" id="tipo" required>

          <br><br>

          <label for="idade"><b>Idade do Pet:</b></label>
          <select name="idade" id="idade" required>
            <option value="selecionar">-Não Selecionado-</option>
            <option value="Filhote">Filhote</option>
            <option value="Adulto">Adulto</option>
            <option value="Idoso">Idoso</option>
          </select>

          <br><br>

          <label for="sexo"><b>Sexo do Pet:</b></label>
          <select name="sexo" id="sexo" required>
            <option value="selecionar">-Não Selecionado-</option>
            <option value="macho">Macho</option>
            <option value="femea">Fêmea</option>
          </select>

          <br><br>

          <label for="descricao"><b>Descrição do Pet:</b></label>
          <textarea name="descricao" id="descricao" placeholder="Descreva o pet" required></textarea>

          <br><br>

          <label for="contato"><b>Telefone para Contato:</b></label>
          <input type="text" name="contato" id="contato" placeholder="(DD) 12345-6789" maxlength="15" required>

          <br><br>

          <button type="submit" class="btn-cadastrar">Cadastrar Pet</button>

        </form>

    </div>
  </section>
  </section>
  <br>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>

</body>

</html>