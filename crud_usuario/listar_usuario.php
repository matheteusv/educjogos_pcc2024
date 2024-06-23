<?php
require '../conn/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_usuario'])) {
    if (isset($_POST['usuario_id'])) {
        $usuario_id = $_POST['usuario_id'];

        // Query para excluir o usuario do banco de dados
        $query_delete = "DELETE FROM usuarios WHERE id = :id_usuarios";
        $stmt_delete = $conn->prepare($query_delete);
        $stmt_delete->bindParam(':id_usuarios', $usuario_id, PDO::PARAM_INT);

        // Verificar se a exclusão foi bem-sucedida
        if ($stmt_delete->execute()) {
            $sucesso_msg[] = 'Usuário excluido com sucesso!';
            // Redireciona após a ação para evitar ressubmissão do formulário

        } else {
            $error_msg[] = 'Erro ao excluir usuário!';
        }
    }
}

$query_select = "SELECT id, nome, email, data_nascimento, tipo FROM usuarios;";
$stmt_select = $conn->query($query_select);
$jogos = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Lista de Usuários</title>
</head>

<body>
    <!-- INICIO DOBRA CABEÇALHO -->
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
    <!-- FIM DOBRA CABEÇALHO -->

    <div class="list_container">
        <h1>Listagem de Dados dos Usuários</h1>
        <br>
        <table width="770px">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Tipo</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($jogos as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['data_nascimento'])) ?></td>
                    <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                    <td>
                        <button class="btn-color"><a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a></button>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="usuario_id" value="<?php echo $row['id']; ?>">
                            <button class="btn-color2" type="submit" name="excluir_usuario">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php require '../alert/alert.php'; ?>
</body>

</html>