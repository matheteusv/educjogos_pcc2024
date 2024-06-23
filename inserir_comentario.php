<?php
include_once 'auth/autenticar.php';

// Inserir comentário se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isUsuarioLogado) {
    $id_usuarios = $_SESSION['usuarios']['id'];
    $comentario = $_POST['comentario'];
    $data_comentario = date('Y-m-d H:i:s'); // Pegar a data e hora atual

    $query = "INSERT INTO comentarios (id_usuarios, id_jogos, comentario, data_comentario) VALUES (:id_usuarios, :id_jogos, :comentario, :data_comentario)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_usuarios', $id_usuarios);
    $stmt->bindParam(':id_jogos', $jogo_id);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->bindParam(':data_comentario', $data_comentario);
    $stmt->execute();

    header("Location: exibir_jogo.php?id=$jogo_id");
    exit;
}

?>

<style>
    .comentarios {
        margin-top: 20px;
        word-wrap: break-word;
    }

    .comentario {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .comentario-form {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .comentario-form label {
        font-weight: bold;
    }

    .comentario-form textarea {
        width: 100%;
        height: 100px;
        padding: 5px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .comentario-form button {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .comentario-form button:hover {
        background-color: #45a049;
    }

    .comentario-form p {
        margin-top: 5px;
        font-style: italic;
    }
</style>

<h2>Deixe seu comentário</h2>
<br>
<?php if ($isUsuarioLogado) : ?>
    <div class="comentario-form">
        <form action="exibir_jogo.php?id=<?= $jogo_id ?>" method="POST">
            <div>
                <label for="comentario">Comentário:</label><br>
                <textarea id="comentario" name="comentario" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
<?php else : ?>
    <p><a href="login.php">Faça login</a> para deixar um comentário. Não tem uma conta? <a href="cadastro.php">Cadastre-se</a> aqui!</p>
<?php endif; ?>

<div class="comentarios">
    <h2>Comentários</h2>
    <?php
    $query = "SELECT c.*, u.nome FROM comentarios c JOIN usuarios u ON c.id_usuarios = u.id WHERE c.id_jogos = :id_jogos ORDER BY c.data_comentario DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_jogos', $jogo_id);
    $stmt->execute();
    $comentarios = $stmt->fetchAll();

    foreach ($comentarios as $comentario) : ?>
        <div class="comentario">
            <strong><?php echo htmlspecialchars($comentario['nome']); ?></strong><br>
            <small>Data: <?= date('d/m/Y', strtotime($comentario['data_comentario'])) ?></small>
            <p><?php echo nl2br(htmlspecialchars($comentario['comentario'])); ?></p>
            <?php if (verificaSePerfilAdmin()) : ?>
                <form action="excluir_comentario.php" method="post" style="display:inline;">
                    <input type="hidden" name="jogo_id" value="<?php echo htmlspecialchars($jogo_id); ?>">
                    <button type="submit" name="excluir_id_comentario" value="<?php echo htmlspecialchars($comentario['id']); ?>">Excluir</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>