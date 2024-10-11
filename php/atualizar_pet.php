<?php
include 'config.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] === 'null') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $animalId = $conn->real_escape_string($_GET['id']);
    $userId = $_SESSION['usuario_id'];

    $sql = "SELECT * FROM animais WHERE id='$animalId' AND usuario_id='$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        die('Você não tem permissão para atualizar este pet.');
    }
} else {
    die('Id do pet não forneido.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $idade = $conn->real_escape_string($_POST['idade']);
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $contato = $conn->real_escape_string($_POST['contato']);

    $sqlUpdate = "UPDATE animais SET nome='$nome', tipo='$tipo', idade='$idade', sexo='$sexo', descricao='$descricao', contato='$contato' WHERE id='    $animalId' AND usuario_id='$userId'";

    if ($conn->query($sqlUpdate)) {
        echo "Pet atualizado com sucesso.";
        header('Location: detalhes_pet.php?id=' . $pet['id']);
        exit();
    } else {
        echo "Erro ao atualizar pet: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Pet</title>
    <link rel="stylesheet" href="../css/atualizar_pet.css">
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

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('imagem').addEventListener('change', function (event) {
                const file = event.target.files[0];
                const preview = document.getElementById('image-preview');
                const previewContainer = document.getElementById('image-preview-container');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
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
            contatoInput.addEventListener("input", function () {
                const formatted = formatarTelefone(this.value);
                this.value = formatted; // Atualiza o valor do campo com a formatação
            });
        });
    </script>
</head>

<body>

    <div class="atualizar-container">
        <h1>Atualizar informações do Pet</h1>

        <div class="Linha"></div>

        <form action="atualizar_pet.php?id=<?php echo htmlspecialchars($animalId); ?>" method="post">

            <label for="imagem">Imagem do Pet:</label>
            <input type="file" name="imagem" id="imagem">

            <div id="image-preview-container" style="display: none;">
                <img src="" alt="Pré visualização da imagem" id="image-preview" style="max-width: 100%; max-height: 200px;">
            </div>
            <p><strong>OBS:</strong>Caso não queira mudar a imagem não selecionar nada.</p>

            <label for="nome">Nome do Pet:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($pet['nome']); ?>">

            <br>

            <label for="tipo">Tipo de Pet:</label>
            <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($pet['tipo']); ?>">

            <br>

            <label for="idade">Idade:</label>
            <select name="idade" id="idade" required>
                <option value="Filhote" <?php echo ($pet['idade'] === 'Filhote') ? 'selected' : '' ?>>Filhote</option>
                <option value="Adulto" <?php echo ($pet['idade'] === 'Adulto') ? 'selected' : '' ?>>Adulto</option>
                <option value="Idoso" <?php echo ($pet['idade'] === 'Idoso') ? 'selected' : '' ?>>Idoso</option>
            </select>

            <br>

            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="macho" <?php echo ($pet['sexo'] === 'Macho') ? 'selected' : '' ?>>Macho</option>
                <option value="femea" <?php echo ($pet['sexo'] === 'Fêmea') ? 'selected' : '' ?>>Fêmea</option>
            </select>

            <br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao"><?php echo htmlspecialchars($pet['descricao']); ?></textarea>

            <br>

            <label for="contato">Contato:</label>
            <input type="text" name="contato" id="contato" value="<?php echo htmlspecialchars($pet['contato']); ?>">

            <br>

            <div class="Linha"></div>

            <br>

            <button type="submit">Atualizar Pet</button>

        </form>
    </div>
</body>

</html>