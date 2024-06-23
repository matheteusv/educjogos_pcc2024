<header class="main_header">
  <div class="main_header_content">
    <a href="index.php" class="logo">
      <img src="img/logo3.png" alt="EDUC JOGOS" title="EDUC JOGOS" />
    </a>

    <nav class="main_header_content_menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#artigos">Artigos</a></li>
        <li><a href="#jogos">Jogos</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <?php if ($isUsuarioLogado) : ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
          <li><a href="login.php">Login</a></li>



          <li><a href="cadastro.php">Cadastrar</a></li>
        <?php endif; ?>





      </ul>
    </nav>
  </div>
</header>