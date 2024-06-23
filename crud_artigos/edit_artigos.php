<?php
session_start();
require_once "../conn/conexao.php";

// Arrays para mensagens
$sucesso_msg = $error_msg = $info_msg = array();

// Recuperar o ID do artigo da consulta GET
$artigo_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($artigo_id)) {
    // Recuperar dados do artigo do banco de dados
    $query = "SELECT titulo, conteudo, data_publicacao, imagem FROM artigos WHERE id = :artigo_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':artigo_id', $artigo_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $artigo = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error_msg[] = 'Erro ao recuperar os dados do artigo!';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['artigo_id'], $_POST['titulo'], $_POST['conteudo'], $_POST['data_artigo']) && isset($_FILES['imagem'])) {
        $artigo_id = $_POST['artigo_id']; // ID do artigo a ser atualizado
        $titulo = htmlspecialchars($_POST['titulo']);
        $conteudo = htmlspecialchars($_POST['conteudo']);
        $data_artigo = $_POST['data_artigo'];
        $id_usuario = isset($_SESSION['usuarios']['id']) ? $_SESSION['usuarios']['id'] : null;

        // Verificando o envio da imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            $target_dir = "../img/";
            $imagem_path = $target_dir . basename($imagem["name"]);
            $imageFileType = strtolower(pathinfo($imagem_path, PATHINFO_EXTENSION));

            // Validar tipo de arquivo
            $valid_types = ['jpg', 'jpeg'];
            if (in_array($imageFileType, $valid_types)) {
                if (move_uploaded_file($imagem["tmp_name"], $imagem_path)) {
                    // Atualizar registro no banco de dados
                    $query = "UPDATE artigos SET titulo = :titulo, imagem = :imagem, conteudo = :conteudo, data_publicacao = :data_publicacao WHERE id = :artigo_id AND id_usuarios = :id_usuarios";
                    try {
                        $stmt = $conn->prepare($query);
                        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
                        $stmt->bindValue(':imagem', $imagem_path, PDO::PARAM_STR);
                        $stmt->bindValue(':conteudo', $conteudo, PDO::PARAM_STR);
                        $stmt->bindValue(':data_publicacao', $data_artigo, PDO::PARAM_STR);
                        $stmt->bindValue(':artigo_id', $artigo_id, PDO::PARAM_INT);
                        $stmt->bindValue(':id_usuarios', $id_usuario, PDO::PARAM_INT);

                        if ($stmt->execute()) {
                            $sucesso_msg[] = 'Artigo atualizado com sucesso!';
                        } else {
                            $error_msg[] = 'Erro ao atualizar o artigo!';
                        }
                    } catch (PDOException $e) {
                        $error_msg[] = 'Erro: ' . $e->getMessage();
                    }
                } else {
                    $error_msg[] = 'Erro ao fazer upload da imagem!';
                }
            } else {
                $error_msg[] = 'Somente arquivos JPG e JPEG são permitidos!';
            }
        } else {
            // Se nenhum arquivo foi enviado, atualize os outros campos sem modificar a imagem
            $query = "UPDATE artigos SET titulo = :titulo, conteudo = :conteudo, data_publicacao = :data_publicacao WHERE id = :artigo_id AND id_usuarios = :id_usuarios";
            try {
                $stmt = $conn->prepare($query);
                $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
                $stmt->bindValue(':conteudo', $conteudo, PDO::PARAM_STR);
                $stmt->bindValue(':data_publicacao', $data_artigo, PDO::PARAM_STR);
                $stmt->bindValue(':artigo_id', $artigo_id, PDO::PARAM_INT);
                $stmt->bindValue(':id_usuarios', $id_usuario, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $sucesso_msg[] = 'Artigo atualizado com sucesso!';
                } else {
                    $error_msg[] = 'Erro ao atualizar o artigo!';
                }
            } catch (PDOException $e) {
                $error_msg[] = 'Erro: ' . $e->getMessage();
            }
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
    <link rel="stylesheet" href="../css/jogos.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>EDUC JOGOS</title>
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
                    <li><a href="../crud_artigos/listar_artigo.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- FIM OPÇÃO -->

    <h1>Editar Artigos</h1>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="artigo_id" value="<?php echo $artigo_id; ?>">

            <div class="form-group">
                <label for="titulo">Título do Artigo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Informe Título do Artigo" value="<?php echo isset($artigo['titulo']) ? $artigo['titulo'] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo:</label>
                <textarea name="conteudo" id="conteudo" cols="30" rows="10" placeholder="Informe Conteúdo do Artigo" required><?php echo isset($artigo['conteudo']) ? $artigo['conteudo'] : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" id="imagem" accept="image/jpg, image/jpeg">
                <?php if (isset($artigo['imagem'])) : ?>
                    <br><img src="<?php echo htmlspecialchars($artigo['imagem']); ?>" alt="Imagem Atual" style="max-width: 200px;">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="data_artigo">Data de Publicação:</label>
                <input type="datetime-local" name="data_artigo" id="data_artigo" value="<?php echo isset($artigo['data_publicacao']) ? date('Y-m-d\TH:i', strtotime($artigo['data_publicacao'])) : ''; ?>" required>
            </div>

            <div class="form-group_btn">
                <br>
                <button type="submit">Atualizar</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php require '../alert/alert.php'; ?>
</body>

</html>