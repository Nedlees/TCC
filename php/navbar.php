<?php 
require_once 'config.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Navbar Responsiva</title>
</head>

<body id="body-content">
  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span> <!-- Ícone de hambúrguer do Font Awesome -->
      </button>

      <a href="index.php" class="navbar-brand">
        <img src="../Imagens/logo.png" alt="logo" style="width: 50px;">
      </a>

      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="adocao.php" class="nav-link">Adote</a>
          </li>
          <li class="nav-item">
            <a href="sobrenos.php" class="nav-link">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a href="doacoes.php" class="nav-link">Ajude</a>
          </li>
          <li class="nav-item">
            <a href="blog.php" class="nav-link">Blog</a>
          </li>
        </ul>
      </div>

      <div class="d-flex">
        <?php if (isset($_SESSION['usuario_id'])): ?>
        <a href="perfil.php" class="btn btn-outline-primary me-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="perfil-icon">
            <path
              d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
          </svg>
          Perfil
        </a>
        <!-- Botão para abrir o modal de logout -->
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
          <i class="fas fa-sign-out-alt perfil-icon"></i> Sair
        </button>
        <?php else: ?>
        <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
        <a href="cadastro.php" class="btn btn-primary">Cadastrar-se</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content custom-modal">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirmação de Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza de que deseja sair?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="logout.php" class="btn btn-danger">Confirmar</a>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>