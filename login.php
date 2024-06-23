<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
  <title>Login EDUC JOGOS</title>
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

    input {
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
      border: none;
      padding: 15px;
      width: 100%;
      border-radius: 10px;
      color: aliceblue;
      font-size: 15px;
      cursor: pointer;
      margin-bottom: 20px;
      box-sizing: border-box;
    }

    button:hover {
      background-color: #9568f7;
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
  <form action="logar.php" method="post">
    <div class="container">
      <h1>Login</h1>
      <input type="text" placeholder="E-mail" name="email" required>
      <br><br>
      <input type="password" placeholder="Senha" name="senha" required>
      <br><br>
      <button type="submit">Enviar</button>
      <div class="link-container">
        <a href="index.php">Voltar</a>
      </div>
    </div>
  </form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <?php require 'alert/alert.php'; ?>
</body>

</html>