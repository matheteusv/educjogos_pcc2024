<?php
session_start();

function verificaSeUsuarioEstaLogado()
{
    return isset($_SESSION['usuarios']);
}

function verificaSePerfilAdmin()
{
    return verificaSeUsuarioEstaLogado() && $_SESSION['usuarios']['tipo'] == 'ADMIN';
}

function verificaSePerfilUsuario()
{
    return verificaSeUsuarioEstaLogado() && $_SESSION['usuarios']['tipo'] == 'USUARIO';
}

$isAdministrador = verificaSePerfilAdmin();
$isUsuarioLogado = verificaSeUsuarioEstaLogado();
$isUsuario = verificaSePerfilUsuario();

if ($isUsuarioLogado && !isset($_SESSION['alerta_exibido'])) {
    // Define uma flag na sessão para indicar que o alerta foi exibido
    $_SESSION['alerta_exibido'] = true;

    // Exibe o alerta usando JavaScript
    echo '<script>
          window.onload = function() {
              Swal.fire("Logado com sucesso!", "Bem-vindo, ' . $_SESSION['usuarios']['nome'] . '!", "success");
          };
        </script>';
}
