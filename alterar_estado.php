<?php
require_once 'funcoes_banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefaId = $_POST['tarefa_id'];
    $novoEstado = $_POST['novo_estado'];

    $conexao = conectarBanco();

    if ($conexao) {
        // Atualize o estado da tarefa no banco de dados
        if (alterarEstadoTarefa($conexao, $tarefaId, $novoEstado)) {
            header('Location: index.php');
            exit;
        } else {
            echo "Erro ao alterar o estado da tarefa.";
        }
    } else {
        echo "Erro de conexão com o banco de dados.";
    }
}
?>
