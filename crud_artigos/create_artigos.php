<?php
session_start();
require_once "../conn/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titulo'], $_POST['conteudo'], $_POST['data_artigo']) && isset($_FILES['imagem'])) {
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $data_artigo = $_POST['data_artigo'];
        $id_usuario = isset($_SESSION['usuarios']['id']) ? $_SESSION['usuarios']['id'] : null; // Verifica se a variável de sessão está definida

        // Processar upload da imagem
        $imagem = $_FILES['imagem'];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($imagem["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validar tipo de arquivo
        $valid_types = ['jpg', 'jpeg'];
        if (in_array($imageFileType, $valid_types)) {
            if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
                // Salvar caminho da imagem no banco de dados
                $query = "INSERT INTO artigos (id_usuarios, titulo, imagem, conteudo, data_publicacao) VALUES (:id_usuarios, :titulo, :imagem, :conteudo, :data_publicacao)";

                try {
                    $stmt = $conn->prepare($query);
                    $stmt->bindValue(':id_usuarios', $id_usuario, PDO::PARAM_STR);
                    $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
                    $stmt->bindValue(':imagem', $target_file, PDO::PARAM_STR);
                    $stmt->bindValue(':conteudo', $conteudo, PDO::PARAM_STR);
                    $stmt->bindValue(':data_publicacao', $data_artigo, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        $sucesso_msg[] = 'Artigo cadastrado com sucesso!';
                    } else {
                        $error_msg[] = 'Erro ao cadastrar o artigo!';
                    }
                } catch (PDOException $e) {
                    // Exibe mensagem de erro na página
                    echo "<script>alert('Erro: " . $e->getMessage() . "')</script>";
                }
            } else {
                $error_msg[] = 'Erro ao fazer upload da imagem!';
            }
        } else {
            $error_msg[] = 'Somente arquivos JPG e JPEG são permitidos!';
        }
    } else {
        $info_msg[] = 'Preencha todos os campos!';
    }
}
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
    <link href="../css/boot.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/artigos.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Cadastrar Artigos</title>
</head>

<body>
    <!-- INICIO OPÇÃO -->
    <header class="main_header">
        <div class="main_header_content">
            <a href="../pagina_adm.php" class="logo">
                <img src="../img/logo3.png" alt="Home EDUC JOGOS">
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../opcao.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- FIM OPÇÃO -->
</body>

</html>

<h1>Cadastrar Artigos</h1>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titulo">Título do Artigo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Informe Título do Artigo" required>
        </div>

        <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" placeholder="Informe Conteúdo do Artigo" required></textarea>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem" accept="image/jpg, image/jpeg" required>
        </div>

        <div class="form-group">
            <label for="data_artigo">Data de Publicação:</label>
            <input type="datetime-local" name="data_artigo" id="data_artigo" required>
        </div>

        <div class="form-group_btn">
            <p>
                <br>
                <button type="submit">Cadastrar</button>
            </p>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php require '../alert/alert.php'; ?>
</body>

</html>