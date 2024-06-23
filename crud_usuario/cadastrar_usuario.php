<?php

require "../conn/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se todos os campos necessários foram recebidos
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['dtNasc'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data_nasc = $_POST['dtNasc'];

        // Valida o formato do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Endereço de e-mail inválido!')</script>";
            exit; // Encerra a execução do script
        }



        $query = 'INSERT INTO usuarios(nome, email, senha, data_nascimento, tipo ) VALUES
        (:nome, :email, :senha, :data_nascimento, :tipo)';
        try {
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindValue(':data_nascimento', $data_nasc, PDO::PARAM_STR);
            $stmt->bindValue(':tipo', 'USUARIO', PDO::PARAM_STR);


            if ($stmt->execute()) {
                $sucesso_msg[] = 'Usuário cadastrado com sucesso!';
            } else {
                $error_msg[] = 'Erro ao cadastrar usuário!';
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erro: " . $e->getMessage() . "')</script>";
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
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/artigos.css">

    <title>Cadastrar Usuários</title>
</head>

<body>
    <!-- INICIO CADASTRAR -->
    <header class="main_header">
        <div class="main_header_content">
            <a href="../pagina_adm.php" class="logo">
                <img src="../img/logo3.png" alt="Logo EDUC JOGOS">
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../opcao.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- FIM CADASTRAR -->
    <h1>Formulário de Cadastro dos Usuários</h1>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" placeholder="Informe Nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Informe E-mail" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Informe Senha" required>
            </div>

            <div class="form-group">
                <label for="dtNasc">Data de Nascimento:</label>
                <input type="date" name="dtNasc" required>
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