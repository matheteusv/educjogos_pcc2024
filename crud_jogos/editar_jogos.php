<?php
require '../conn/conexao.php';
session_start();

// Arrays para mensagens
$sucesso_msg = $error_msg = $info_msg = array();

// Recuperar o ID do jogo da consulta GET
$jogo_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($jogo_id)) {
    // Buscar dados do jogo no banco de dados
    $query = "SELECT * FROM jogos WHERE id = :jogo_id";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':jogo_id', $jogo_id, PDO::PARAM_INT);
        $stmt->execute();
        $jogo = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error_msg[] = 'Erro: ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['jogo_id'], $_POST['titulo_jogo'], $_POST['data_jogo'], $_POST['descricao_jogo'], $_POST['armazernar_jogo']) && isset($_FILES['imagem_jogo'])) {
        $jogo_id = $_POST['jogo_id']; // ID do jogo a ser atualizado
        $titulo_jogo = $_POST['titulo_jogo'];
        $descricao_jogo = $_POST['descricao_jogo'];
        $data_jogo = $_POST['data_jogo'];
        $armazernar_jogo = $_POST['armazernar_jogo'];
        $id_usuario = isset($_SESSION['usuarios']['id']) ? $_SESSION['usuarios']['id'] : null;

        // Verificando o envio da imagem
        if (isset($_FILES['imagem_jogo']) && $_FILES['imagem_jogo']['error'] === UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem_jogo'];
            $target_dir = "../img/";
            $imagem_jogo = $target_dir . basename($imagem["name"]);
            $imageFileType = strtolower(pathinfo($imagem_jogo, PATHINFO_EXTENSION));

            // Validar tipo de arquivo
            $valid_types = ['jpg', 'jpeg'];
            if (in_array($imageFileType, $valid_types)) {
                if (move_uploaded_file($imagem["tmp_name"], $imagem_jogo)) {
                    // Atualizar registro no banco de dados
                    $query = "UPDATE jogos SET titulo_jogo = :titulo_jogo, imagem_jogo = :imagem_jogo, data_jogo = :data_jogo, descricao_jogo = :descricao_jogo, iframe_url = :iframe_url WHERE id = :jogo_id;";
                    try {
                        $stmt = $conn->prepare($query);
                        $stmt->bindValue(':titulo_jogo', $titulo_jogo, PDO::PARAM_STR);
                        $stmt->bindValue(':imagem_jogo', $imagem_jogo, PDO::PARAM_STR);
                        $stmt->bindValue(':data_jogo', $data_jogo, PDO::PARAM_STR);
                        $stmt->bindValue(':descricao_jogo', $descricao_jogo, PDO::PARAM_STR);
                        $stmt->bindValue(':iframe_url', $armazernar_jogo, PDO::PARAM_STR);
                        $stmt->bindValue(':jogo_id', $jogo_id, PDO::PARAM_INT);

                        if ($stmt->execute()) {
                            $sucesso_msg[] = 'Jogo atualizado com sucesso!';
                        } else {
                            $error_msg[] = 'Erro ao atualizar o jogo!';
                        }
                    } catch (PDOException $e) {
                        // Exibe mensagem de erro na página
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
            $query = "UPDATE jogos SET titulo_jogo = :titulo_jogo, data_jogo = :data_jogo, descricao_jogo = :descricao_jogo, iframe_url = :iframe_url WHERE id = :jogo_id;";
            try {
                $stmt = $conn->prepare($query);
                $stmt->bindValue(':titulo_jogo', $titulo_jogo, PDO::PARAM_STR);
                $stmt->bindValue(':data_jogo', $data_jogo, PDO::PARAM_STR);
                $stmt->bindValue(':descricao_jogo', $descricao_jogo, PDO::PARAM_STR);
                $stmt->bindValue(':iframe_url', $armazernar_jogo, PDO::PARAM_STR);
                $stmt->bindValue(':jogo_id', $jogo_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $sucesso_msg[] = 'Jogo atualizado com sucesso!';
                } else {
                    $error_msg[] = 'Erro ao atualizar o jogo!';
                }
            } catch (PDOException $e) {
                // Exibe mensagem de erro na página
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
                    <li><a href="../crud_jogos/listar_jogos.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- FIM OPÇÃO -->

    <h1>Editar Jogos</h1>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="jogo_id" value="<?php echo htmlspecialchars($jogo_id); ?>">

            <div class="form-group">
                <label for="titulo_jogo">Título:</label>
                <input type="text" name="titulo_jogo" id="titulo_jogo" placeholder="Informe Título do Jogo" value="<?php echo isset($jogo['titulo_jogo']) ? htmlspecialchars($jogo['titulo_jogo']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao_jogo">Descrição:</label>
                <textarea name="descricao_jogo" id="descricao_jogo" placeholder="Informe Descrição do Jogo" cols="30" rows="10" required><?php echo isset($jogo['descricao_jogo']) ? htmlspecialchars($jogo['descricao_jogo']) : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="imagem_jogo">Imagem:</label>
                <input type="file" name="imagem_jogo" id="imagem_jogo" accept="image/jpg, image/jpeg">
                <?php if (isset($jogo['imagem_jogo'])) : ?>
                    <br><img src="<?php echo htmlspecialchars($jogo['imagem_jogo']); ?>" alt="Imagem do Jogo" style="max-width: 200px;">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="data_jogo">Data do Jogo:</label>
                <input type="datetime-local" name="data_jogo" id="data_jogo" value="<?php echo isset($jogo['data_jogo']) ? date('Y-m-d\TH:i', strtotime($jogo['data_jogo'])) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="armazernar_jogo">Código do iframe:</label>
                <textarea name="armazernar_jogo" id="armazernar_jogo" placeholder="Informe iframe do Jogo" cols="30" rows="3" required><?php echo isset($jogo['iframe_url']) ? htmlspecialchars($jogo['iframe_url']) : ''; ?></textarea>
            </div>

            <div class="form-group_btn">
                <button type="submit">Atualizar</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php require '../alert/alert.php'; ?>
</body>

</html>