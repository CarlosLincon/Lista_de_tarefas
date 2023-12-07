<?php
$tarefa = $_POST['tarefa'];
$estado = $_POST['estado'];

// Conecte-se ao banco de dados
 $conexao = new PDO('mysql:host=localhost;dbname=meu_banco_de_dados', 'usuario', 'senha');

// Verifique se a tabela de tarefas existe e crie-a se necessário
$conexao->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tarefa VARCHAR(255) NOT NULL,
     estado VARCHAR(255) NOT NULL
 )");

// Insira a tarefa no banco de dados
$sql = "INSERT INTO tarefas (tarefa, estado) VALUES (?, ?)";
 $stmt = $conexao->prepare($sql);
 $stmt->execute([$tarefa, $estado]);

echo "Tarefa salva com sucesso!";
?>
