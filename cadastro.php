<?php
require "conn/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se todos os campos necessários foram recebidos
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['data_nasc'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data_nasc = $_POST['data_nasc'];

        // Valida o formato do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('{ERROR} Endereço de email inválido!')</script>";
            header('location:cadastro.php');

            exit;

            // Encerra a execução do script
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
    <title>Cadastro EDUC JOGOS</title>
    <style>
        body {
            font-family: Ubuntu, Arial, Helvetica, sans-serif;
            background-image: linear-gradient(72deg, #3DEBB0 1%, #8956F3 99%);
        }

        .container {
            background-color: aliceblue;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: #2d3142;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        input,
        button {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #8956F3;
            border-radius: 10px;
            color: aliceblue;
            cursor: pointer;
        }

        button:hover {
            background-color: #9568f7;
        }

        label {
            width: 100%;
            text-align: left;
            margin-bottom: 5px;
            font-size: 15px;
            color: #2d3142;
        }

        .link-container {
            text-align: center;
        }

        .link-container a {
            display: block;
            text-decoration: underline;
            color: #333;
            font-size: 15px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <h1>Cadastrar</h1>
            <input type="text" placeholder="Informe Nome Completo" name="nome" required>
            <br><br>
            <input type="email" placeholder="Informe seu E-mail" name="email" required>
            <br><br>
            <input type="password" placeholder="Crie sua Senha" name="senha" required>
            <br><br>
            <label for="date">Data de Nascimento:</label>
            <br>
            <input type="date" placeholder="Informe Data de Nascimento" name="data_nasc" required>
            <br><br>
            <button type="submit" id="btn_alert">Enviar</button>
            <br><br>
            <div class="link-container">
                <a href="index.php">Voltar</a>
                <a href="login.php">Já tem uma conta? Faça o Login Aqui!</a>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php require 'alert/alert.php'; ?>

</body>

</html>