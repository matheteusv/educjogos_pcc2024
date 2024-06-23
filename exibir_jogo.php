<?php

require 'conn/conexao.php';
include 'auth/autenticar.php';

if (isset($_GET['id'])) {
    $jogo_id = $_GET['id'];

    $query = "SELECT * FROM jogos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $jogo_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
            <link href="css/exibir_jogo.css" rel="stylesheet" />
            <title>Exibir Jogo</title>
        </head>

        <body>
            <!--INICIO DOBRA CABEÇALHO-->
            <?php
            if (verificaSePerfilAdmin()) {
                include 'inc/menu-adm.php';
            } else {
                include 'inc/menu.php';
            }
            ?>
            <!--FIM DOBRA CABEÇALHO-->

            <article class="game">
                <h1>
                    <?= htmlspecialchars($row['titulo_jogo']) ?>
                </h1>
                <br>
                <?php echo $row['iframe_url'] ?>
                <br><br>
                <p>
                    <?= nl2br(htmlspecialchars($row['descricao_jogo'])) ?>
                </p>
                <br>
                <h2>
                    Publicado em:
                    <?= date('d/m/Y H:i', strtotime($row['data_jogo'])) ?>
                </h2>
                <br>
                <?php
                include 'inserir_comentario.php';
                ?>

                </div>
            </article>
    <?php
    } else {
        echo "<p>Jogo não encontrado.</p>";
    }
} else {
    echo "<p>ID do jogo não especificado.</p>";
}
    ?>

    <?php
    include 'footer.php';
    ?>

</body>

</html>