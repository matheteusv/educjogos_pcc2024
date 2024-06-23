<?php
require '../conn/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_jogo'])) {
    if (isset($_POST['jogo_id_excluir'])) {
        $jogo_id_excluir = $_POST['jogo_id_excluir'];

        // Query para excluir o jogo do banco de dados
        $query_delete = "DELETE FROM jogos WHERE id = :jogo_id";
        $stmt_delete = $conn->prepare($query_delete);
        $stmt_delete->bindParam(':jogo_id', $jogo_id_excluir, PDO::PARAM_INT);

        // Verificar se a exclusão foi bem-sucedida
        if ($stmt_delete->execute()) {
            $sucesso_msg[] = 'Jogo excluido com sucesso!';
            // Redireciona após a ação para evitar ressubmissão do formulário

        } else {
            $error_msg[] = 'Erro ao excluir jogo!';
        }
    }
}

// Consulta para obter os jogos após possível exclusão
$query_select = "SELECT id, titulo_jogo, imagem_jogo, data_jogo FROM jogos;";
$stmt_select = $conn->query($query_select);
$jogos = $stmt_select->fetchAll(PDO::FETCH_ASSOC); // Armazenar os resultados em um array
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
    <title>Lista de Jogos</title>
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
        <h1>Listagem de Dados dos Jogos</h1>
        <br>
        <table width="770px">
            <tr>
                <th>Título do Jogo</th>
                <th>Data Criada</th>
                <th>Imagem</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($jogos as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['titulo_jogo']); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($row['data_jogo'])) ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['imagem_jogo']); ?>" alt="" width="50px"></td>
                    <td>
                        <button class="btn-color"><a href="editar_jogos.php?id=<?php echo $row['id']; ?>">Editar</a></button>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="jogo_id_excluir" value="<?php echo $row['id']; ?>">
                            <button class="btn-color2" type="submit" name="excluir_jogo">Excluir</button>
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