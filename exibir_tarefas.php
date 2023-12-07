<?php
// Inclua esta parte no seu index.php para exibir as tarefas
require_once 'funcoes_banco.php';

$conexao = conectarBanco();

if ($conexao) {
    $tarefas = obterTarefas($conexao);

    foreach ($tarefas as $tarefa) {
        ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title <?php echo gerarCorEstado($tarefa['estado']); ?>"><?php echo $tarefa['tarefa']; ?></h5>
                    <p class="card-text"><strong>Estado:</strong> <?php echo $tarefa['estado']; ?></p>
                    
                    <!-- Formulário para alterar o estado -->
                    <form action="alterar_estado.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?>">
                        <div class="form-group">
                            <label for="novo_estado">Novo Estado</label>
                            <select class="form-control" id="novo_estado" name="novo_estado">
                                <option value="Não iniciado">Não iniciado</option>
                                <option value="Em andamento">Em andamento</option>
                                <option value="Concluído">Concluído</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Alterar Estado</button>
                    </form>
                    
                    <!-- Formulário para excluir a tarefa -->
                    <form action="excluir_tarefa.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?>">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "Erro de conexão com o banco de dados.";
}
?>

<?php
function gerarCorEstado($estado) {
    // Adicione as condições conforme necessário para definir as cores com base nos estados
    switch ($estado) {
        case 'Não iniciado':
            return 'text-danger'; // Vermelho
        case 'Em andamento':
            return 'text-warning'; // Amarelo
        case 'Concluído':
            return 'text-success'; // Verde
        default:
            return ''; // Nenhum estilo específico
    }
}
?>
