<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=tarefas', 'usuario', 'senha');

// Comando SQL para criar a tabela
$sql = "CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tarefa VARCHAR(255) NOT NULL
)";

// Executa o comando SQL
$pdo->exec($sql);

echo "Tabela tarefas criada com sucesso!";
?>
