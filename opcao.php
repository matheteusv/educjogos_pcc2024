<?php
require 'conn/conexao.php';
include 'auth/autenticar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="css/boot.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/opcao.css">
    <title>Pagina do ADM</title>
</head>

<body>

    <!-- INICIO OPÇÃO -->
    <?php include 'inc/menu-adm.php'; ?>
    <!-- FIM OPÇÃO -->
    <main>
        <div>
            <section class="main_course">
                <header class="main_course_header"></header>
                <div class="ajust">
                    <article>
                        <h2>Cadastrar Usuários</h2>
                        <header>
                            <p>
                                <a href="crud_usuario/cadastrar_usuario.php">
                                    <img src="img/cadusuarios.png" alt="Cadastro" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Alterar Usuários</h2>
                        <header>
                            <p>
                                <a href="crud_usuario/listar_usuario.php">
                                    <img src="img/altusuarios.png" alt="Alterar" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Cadastrar Artigos</h2>
                        <header>
                            <p>
                                <a href="crud_artigos/create_artigos.php">
                                    <img src="img/cadartigos.png" alt="Alterar" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Alterar Artigos</h2>
                        <header>
                            <p>
                                <a href="crud_artigos/listar_artigo.php">
                                    <img src="img/altartigos.png" alt="Alterar" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Cadastrar Jogos</h2>
                        <header>
                            <p>
                                <a href="crud_jogos/create_jogos.php">
                                    <img src="img/cadjogos.png" alt="Alterar" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Alterar Jogos</h2>
                        <header>
                            <p>
                                <a href="crud_jogos/listar_jogos.php">
                                    <img src="img/altjogos.png" alt="Alterar" width="400" height="300" />
                                </a>
                            </p>
                        </header>
                    </article>
                </div>
            </section>
        </div>
    </main>

</body>

</html>