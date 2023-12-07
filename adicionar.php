<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=tarefas', 'usuario', 'senha');

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega a tarefa do POST
    $tarefa = $_POST['tarefa'];

    // Prepara a inserção
    $stmt = $pdo->prepare('INSERT INTO tarefas (tarefa) VALUES (?)');

    // Executa a inserção
    $stmt->execute([$tarefa]);
}

// Redireciona de volta para a página inicial
header('Location: index.html');
