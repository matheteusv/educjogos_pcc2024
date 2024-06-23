<?php
session_start();

require "conn/conexao.php";



if (isset($_POST['email'], $_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    require 'usuarioClass.php';
    $usu = new Usuario($conn);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    if ($usu->login($email, $senha)) {
        header('location: index.php');
        exit;
    } else {
        header('location: login.php');
        exit;
    }
} else {
    header('location: login.php');
    exit;
}
