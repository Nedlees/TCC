<?php 
require_once 'config.php';

// Inicializa as variáveis de filtro
$nomeFiltro = isset($_GET['nome']) ? $_GET['nome'] : '';
$tipoFiltro = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$idadeFiltro = isset($_GET['idade']) ? $_GET['idade'] : '';
$sexoFiltro = isset($_GET['sexo']) ? $_GET['sexo'] : '';

// Monta a consulta SQL com base nos filtros
$sql = "SELECT * FROM animais WHERE 1=1"; // 1=1 para facilitar a concatenação

if ($nomeFiltro) {
    $sql .= " AND nome LIKE '%" . $conn->real_escape_string($nomeFiltro) . "%'";
}
if ($tipoFiltro) {
    $sql .= " AND tipo = '" . $conn->real_escape_string($tipoFiltro) . "'";
}
if ($idadeFiltro) {
    $sql .= " AND idade = '" . $conn->real_escape_string($idadeFiltro) . "'";
}
if ($sexoFiltro) {
    $sql .= " AND sexo = '" . $conn->real_escape_string($sexoFiltro) . "'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adoção de Animais</title>
  <link rel="stylesheet" href="../css/adocao.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

  <header>
    <?php include 'navbar.php'; ?>
  </header>

  <a href="index.php" class="Back">Voltar</a>

  <h1>Adoção e Doação de Pets</h1>
  <?php if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] !== 'null') : ?>
  <div class="container-btn">
    <a href="cadastro_animal.php" class="btn-cadastrar-animal">Cadastrar um Pet</a>
    <?php else : ?>
    <p><a href="login.php">Faça login</a> para cadastrar um pet.</p>
    <?php endif; ?>
  </div>

  <div class="Linha"></div>

  <body id="body-content">
    <div class="container">


      <section class="filter-toggle">
        <button id="toggle-filter">🔍 Filtros</button>
        <button onclick="window.location.href='pets_curtidos.php'" class="btn-pets">Pets Curtidos</button>
      </section>

      <section class="filter-section" id="filter-section">
        <h2>Filtrar Pets</h2>
        <form action="adocao.php" method="get">
          <label for="nome"><b>Nome do Pet:</b></label>
          <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nomeFiltro); ?>">

          <label for="tipo"><b>Tipo de Pet:</b></label>
          <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($tipoFiltro); ?>">

          <label for="idade"><b>Idade:</b></label>
          <select name="idade" id="idade">
            <option value="">Todas</option>
            <option value="filhote" <?php echo $idadeFiltro === 'filhote' ? 'selected' : ''; ?>>Filhote</option>
            <option value="adulto" <?php echo $idadeFiltro === 'adulto' ? 'selected' : ''; ?>>Adulto</option>
            <option value="idoso" <?php echo $idadeFiltro === 'idoso' ? 'selected' : ''; ?>>Idoso</option>
          </select>

          <label for="sexo">Sexo:</label>
          <select name="sexo" id="sexo">
            <option value="">Todos</option>
            <option value="macho" <?php echo $sexoFiltro === 'macho' ? 'selected' : ''; ?>>Macho</option>
            <option value="femea" <?php echo $sexoFiltro === 'femea' ? 'selected' : ''; ?>>Fêmea</option>
          </select>

          <button type="submit">Filtrar</button>
        </form>
      </section>

      <div class="container-card animal-list">
        <?php if ($result->num_rows > 0): ?>
        <?php while ($pet = $result->fetch_assoc()) : ?>
        <div class="card" onclick="window.location='detalhes_pet.php?id=<?php echo $pet['id']; ?>'">
          <img src="<?php echo htmlspecialchars($pet['imagem']); ?>" alt="Imagem do Pet">
          <h2><?php echo htmlspecialchars($pet['nome']); ?></h2>
          <p>Idade: <?php echo htmlspecialchars($pet['idade']); ?></p>
          <p>Tipo: <?php echo htmlspecialchars($pet['tipo']); ?></p>
          <p>Sexo: <?php echo htmlspecialchars($pet['sexo']); ?></p>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>Nenhum pet encontrado com os critérios selecionados.</p>
        <?php endif; ?>
      </div>
    </div>


  </body>

  <footer>
    <?php include 'footer.php'; ?>
  </footer>

  <script src="../js/adocao.js"></script>

</html>

<?php
$conn->close();
?>