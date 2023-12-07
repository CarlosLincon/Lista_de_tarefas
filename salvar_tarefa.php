<?php
session_start();

$tarefa = $_POST['tarefa'];
$estado = $_POST['estado'];

$conexao = new mysqli('127.0.0.1', 'root', '', 'listatarefas');

if ($conexao->connect_error) {
    $_SESSION['alert'] = 'Erro de conexão com o banco de dados.';
} else {
    $conexao->query("CREATE TABLE IF NOT EXISTS tarefas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tarefa VARCHAR(255) NOT NULL,
        estado VARCHAR(255) NOT NULL
    )");

    $stmt = $conexao->prepare("INSERT INTO tarefas (tarefa, estado) VALUES (?, ?)");
    $stmt->bind_param("ss", $tarefa, $estado);

    if ($stmt->execute()) {
        $_SESSION['alert'] = 'Tarefa salva com sucesso!';
    } else {
        $_SESSION['alert'] = 'Erro ao salvar a tarefa.';
    }
}

header('Location: index.php');
exit;
?>
