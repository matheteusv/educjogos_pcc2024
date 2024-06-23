<?php
include 'conn/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id_comentario'])) {
    $excluir_id_comentario = $_POST['excluir_id_comentario'];
    $jogo_id = $_POST['jogo_id'];
    $query_delete = "DELETE FROM comentarios WHERE id = :comentario_id";
    $stmt_delete = $conn->prepare($query_delete);
    $stmt_delete->bindParam(':comentario_id', $excluir_id_comentario);

    if ($stmt_delete->execute()) {
        // Redirecionar de volta à página de exibição do jogo
        header("Location: exibir_jogo.php?id=$jogo_id");
    } else {
        echo "<script>alert('NÃO EXCLUIU!')</script>";
    }
}
