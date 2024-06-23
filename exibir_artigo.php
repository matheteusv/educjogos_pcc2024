<?php
require 'conn/conexao.php';
include 'auth/autenticar.php';

// Verifica se foi passado um ID de artigo na URL
if (isset($_GET['id'])) {
    $artigo_id = $_GET['id'];

    // Consulta o banco de dados para obter o artigo com o ID especificado
    $query = "SELECT * FROM artigos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $artigo_id);
    $stmt->execute();

    // Verifica se o artigo foi encontrado
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
            <link href="css/exibir_artigo.css" rel="stylesheet" />
            <title>Exibir Artigo</title>
        </head>

        <?php
        if (verificaSePerfilAdmin()) {
            include 'inc/menu-adm.php';
        } else {
            include 'inc/menu.php';
        }
        ?>

        <section class="home">
            <div class="home_container">
                <div class="content-box">
                    <div class="home_img">
                        <img src="img/<?php echo basename($row['imagem']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                    </div>
                    <div class="home_text">
                        <h2>
                            <?php echo htmlspecialchars($row['titulo']); ?>
                        </h2>
                        <br>
                        <h3>Publicado em:
                            <?= date('d/m/Y H:i', strtotime($row['data_publicacao'])) ?>
                        </h3>
                        <br>
                        <p>
                            <?php echo nl2br(htmlspecialchars_decode($row['conteudo'])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
        </body>

        </html>
<?php
    } else {
        echo "<p>Artigo não encontrado.</p>";
    }
} else {
    echo "<p>ID do artigo não especificado.</p>";
}
?>