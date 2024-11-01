<?php
require_once 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] === 'null') {
    header('Location: login.php');
    exit;
}

// Ativa a exibição de erros
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$usuarioId = $_SESSION['usuario_id'];

if (isset($_GET['id'])) {
    $animalId = $conn->real_escape_string($_GET['id']);

    $sqlPet = "SELECT a.id, a.nome, a.tipo, a.idade, a.descricao, a.imagem, a.contato, a.sexo, a.usuario_id, u.nome AS nome_usuario, u.email AS email_usuario 
           FROM animais a
           JOIN usuarios u ON a.usuario_id = u.id 
           WHERE a.id = '$animalId'";

    $resultPet = $conn->query($sqlPet);

    if ($resultPet->num_rows > 0) {
        $pet = $resultPet->fetch_assoc();
    } else {
        die('Pet não encontrado.');
    }

    $sqlOutros = "SELECT id, nome, imagem FROM animais WHERE id != '$animalId'";

    $resultOutros = $conn->query($sqlOutros);
} else {
    die('Id do pet não encontrado.');
}

$isOwner = $usuarioId == $pet['usuario_id'];

// Inicializa a variável $curtido
$curtido = false;

// Verifica se o usuário já curtiu o pet
$checkSql = "SELECT * FROM curtidas WHERE usuario_id = '$usuarioId' AND animal_id = '$animalId'";
$checkResult = $conn->query($checkSql);
if ($checkResult->num_rows > 0) {
    $curtido = true;
}

if (isset($_POST['curtir'])) {

    if ($curtido) {
        $deleteSql = "DELETE FROM curtidas WHERE usuario_id = '$usuarioId' AND animal_id = '$animalId'";
        if ($conn->query($deleteSql)) {
            $curtido = false;
        } else {
            echo "Erro ao descurtir o pet: " . $conn->error;
        }
    } else {

        $insertSql = "INSERT INTO curtidas (usuario_id, animal_id) VALUES ('$usuarioId', '$animalId')";
        if ($conn->query($insertSql)) {
            $curtido = true;
        } else {
            echo "Erro ao curtir o pet: " . $conn->error;
        }
    }
}

if (isset($_POST['remover_pet'])) {
    $sqlDelete = "DELETE FROM animais WHERE id = '$animalId' AND usuario_id = '$usuarioId'";
    if ($conn->query($sqlDelete)) {
        echo "Pet Removido com sucesso.";
        header('Location: adocao.php');
        exit;
    } else {
        echo "Erro ao remover o pet: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pet</title>
    <link rel="stylesheet" href="../css/detalhes_pet.css">
</head>

<body>

    <header>
        <?php
        include 'navbar.php';
        ?>
    </header>

    <a href="adocao.php" class="Back">Voltar</a>

    <h1>Detalhes do Pet: <?php echo htmlspecialchars($pet['nome']); ?></h1>

    <main class="detalhes-pet-container">

        <!-- Seção de Detalhes do Pet -->
        <section class="detalhes-pet">
            <img src="<?php echo htmlspecialchars($pet['imagem']); ?>" alt="Imagem do Pet">
            <h2><?php echo htmlspecialchars($pet['nome']); ?></h2>
            <p>Tipo: <b><?php echo htmlspecialchars($pet['tipo']); ?></b></p>
            <p>Idade: <b><?php echo htmlspecialchars($pet['idade']); ?></b></p>
            <p>Sexo: <b><?php echo htmlspecialchars($pet['sexo']); ?></b></p>
            <p>Descrição: <b><?php echo htmlspecialchars($pet['descricao']); ?></b></p>

            <form action="detalhes_pet.php?id=<?php echo $animalId; ?>" method="post">
                <button type="submit" name="curtir" class="btn-curtir">
                    <?php echo $curtido ? '❌ Descurtir' : '🤍 Curtir'; ?>
                </button>
            </form>

            <div class="Linha"></div>

        <!-- Seção de Informações do Adotante -->
        <section class="informacoes-adotante">
            <h3>Informações do Doador</h3>
            <p>Nome: <b><?php echo htmlspecialchars($pet['nome_usuario']); ?></b></p>
            <p>E-mail: <b><?php echo htmlspecialchars($pet['email_usuario']); ?></b></p>
            <p>Contato: <b><?php echo htmlspecialchars($pet['contato']); ?></b></p>
        </section>

 <!-- Se o usuário for dono do pet, exibe os botões -->
        <?php if ($isOwner): ?>
            <div class="btn-group"> <!-- Agrupando os botões -->
                <form action="detalhes_pet.php?id=<?php echo $animalId; ?>" method="post" onsubmit="return confirm('Tem certeza que deseja remover este pet?');">
                    <button type="submit" name="remover_pet" class="btn-remover">Remover Pet</button>
                </form>

                <a href="atualizar_pet.php?id=<?php echo $animalId; ?>" class="btn-atualizar">Atualizar informações</a>
            </div>

        <?php endif; ?>
</section>

        <!-- Seção com a lista de outros pets -->

        <aside class="outros-pets">
            <h3>Outros pets para adoção</h3>
            <?php
            if ($resultOutros->num_rows > 0) {
                while ($outroPet = $resultOutros->fetch_assoc()) {
                    echo "<div class='outro-pet'>";
                    echo "<a href='detalhes_pet.php?id=" . htmlspecialchars($outroPet['id']) . "'>";
                    echo "<img src='" . htmlspecialchars($outroPet['imagem']) . "' alt='Imagem de " . htmlspecialchars($outroPet['nome']) . "'>";
                    echo "<p>" . htmlspecialchars($outroPet['nome']) . "</p>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>não há outros pets disponiveis para adição no momento.</p>";
            }
            ?>
        </aside>
    </main>

    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>

</body>

</html>

<?php
$conn->close();
?>