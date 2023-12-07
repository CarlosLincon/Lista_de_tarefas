<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefaId = $_POST['tarefa_id'];

    $conexao = new mysqli('127.0.0.1', 'root', '', 'listatarefas');

    if ($conexao->connect_error) {
        $_SESSION['alert'] = 'Erro de conexão com o banco de dados.';
    } else {
        // Excluir a tarefa do banco de dados
        $stmt = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
        $stmt->bind_param("i", $tarefaId);

        if ($stmt->execute()) {
            $_SESSION['alert'] = 'Tarefa excluída com sucesso!';
        } else {
            $_SESSION['alert'] = 'Erro ao excluir a tarefa.';
        }
    }
}

header('Location: index.php');
exit;
?>
