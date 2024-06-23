<header class="main_header">
    <div class="main_header_content">
        <a href="pagina_adm.php" class="logo">
            <img src="img/logo3.png" alt="EDUC JOGOS" title="EDUC JOGOS" />
        </a>

        <nav class="main_header_content_menu">
            <ul>
                <li><a href="pagina_adm.php">Home</a></li>
                <li><a href="#artigos">Artigos</a></li>
                <li><a href="#jogos">Jogos</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <?php if ($isUsuarioLogado) : ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>


                    <?php if ($isAdministrador) : ?>
                        <li><a href="cadastro.php">Cadastrar</a></li>
                    <?php endif; ?>
                <?php endif; ?>

                <li><a href="opcao.php">ADM <i class="fa-solid fa-angle-down"></i></a></li>




            </ul>
        </nav>
    </div>
</header>