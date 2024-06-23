<?php
session_start();
require '../conn/conexao.php';

// Arrays para mensagens
$sucesso_msg = $error_msg = $info_msg = array();

// Recuperar o ID do usuário da consulta GET
$usuario_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($usuario_id)) {
    // Recuperar dados do usuário do banco de dados
    $query = "SELECT nome, email, senha, data_nascimento FROM usuarios WHERE id = :usuario_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error_msg[] = 'Erro ao recuperar os dados do usuário!';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario_id'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['dtNasc'])) {
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        $data_nasc = $_POST['dtNasc'];
        $usuario_id = $_POST['usuario_id']; // Obtém o ID do usuário a ser editado
        $id_usuario = isset($_SESSION['usuarios']['id']) ? $_SESSION['usuarios']['id'] : null;

        // Verificando o envio do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg[] = 'Endereço de e-mail inválido!';
        } else {
            // Atualizar registro no banco de dados
            $query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, data_nascimento = :data_nascimento WHERE id = :id";
            try {
                $stmt = $conn->prepare($query);
                $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
                $stmt->bindValue(':data_nascimento', $data_nasc, PDO::PARAM_STR);
                $stmt->bindValue(':id', $usuario_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $sucesso_msg[] = 'Usuário atualizado com sucesso!';
                } else {
                    $error_msg[] = 'Erro ao atualizar o usuário!';
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
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/artigos.css">
    <title>EDUC JOGOS</title>
</head>

<body>
    <!-- INICIO OPÇÃO -->
    <header class="main_header">
        <div class="main_header_content">
            <a href="../index.php" class="logo">
                <img src="../img/logo3.png" alt="Home EDUC JOGOS">
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../crud_usuario/listar_usuario.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- FIM OPÇÃO -->

    <h1>Editar Usuários</h1>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" placeholder="Informe Nome" value="<?php echo isset($usuario['nome']) ? htmlspecialchars($usuario['nome']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Informe E-mail" value="<?php echo isset($usuario['email']) ? htmlspecialchars($usuario['email']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Informe Senha" value="<?php echo isset($usuario['senha']) ? htmlspecialchars($usuario['senha']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="dtNasc">Data de Nascimento:</label>
                <input type="date" name="dtNasc" value="<?php echo isset($usuario['data_nascimento']) ? $usuario['data_nascimento'] : ''; ?>" required>
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