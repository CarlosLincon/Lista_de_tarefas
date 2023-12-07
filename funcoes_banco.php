<?php
// Adicione esta função ao seu funcoes_banco.php

function conectarBanco() {
    $conexao = new mysqli('127.0.0.1', 'root', '', 'listatarefas');
    return $conexao->connect_error ? false : $conexao;
}

function obterTarefas($conexao) {
    $resultado = $conexao->query("SELECT * FROM tarefas");

    $tarefas = [];
    while ($row = $resultado->fetch_assoc()) {
        $tarefas[] = $row;
    }

    return $tarefas;
}

function alterarEstadoTarefa($conexao, $tarefaId, $novoEstado) {
    $stmt = $conexao->prepare("UPDATE tarefas SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $novoEstado, $tarefaId);

    return $stmt->execute();
}
?>
