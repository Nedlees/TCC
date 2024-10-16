<?php 

include 'config.php';

if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit();
}

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT animais.* FROM animais
JOIN curtidas ON animais.id = curtidas.animal_id
WHERE curtidas.usuario_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt -> get_result();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/pets_curtidos.css">
  <title>Pets Curtidos</title>
</head>
<body>
  
<header>
  <?php include 'navbar.php'; ?>
</header>

<a href="adocao.php" class="Back">Voltar</a>
<h1>Bem Vindo a os seus pets curtidos!</h1>

<div class="container-card">
  <?php if ($result->num_rows > 0): ?>
    <?php while ($pet = $result->fetch_assoc()): ?>
    <div class="card" onclick="window.location.href='detalhes_pet.php?id=<?php echo $pet['id']; ?>'">
      <img src="<?php echo htmlspecialchars($pet['imagem']); ?>" alt="<?php echo htmlspecialchars($pet['nome']); ?>">
      <h2><?php echo htmlspecialchars($pet['nome']); ?></h2>
      <p>Idade: <?php echo htmlspecialchars($pet['idade']); ?></p>
      <p>Tipo: <?php echo htmlspecialchars($pet['tipo']); ?></p>
      <p>Sexo: <?php echo htmlspecialchars($pet['sexo']); ?></p>      
    </div>
    <?php endwhile; ?>
  <?php else: ?>
      <p>Você ainda não curtiu nenhum pet.</p>
  <?php endif; ?>
</div>

<footer>
  <?php include 'footer.php'; ?>
</footer>

</body>
</html>