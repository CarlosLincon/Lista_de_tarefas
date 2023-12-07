<!DOCTYPE html>
<html>

<head>
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Gerenciador de Tarefas</h1>
        <form action="salvar_tarefa.php" method="post">
            <div class="form-group">
                <label for="tarefa">Tarefa</label>
                <input type="text" class="form-control" id="tarefa" name="tarefa">
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option>Não iniciado</option>
                    <option>Em andamento</option>
                    <option>Concluído</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        <?php
        //Conecte-se ao banco de dados e obtenha as tarefas
        $conexao = new PDO('mysql:host=localhost;dbname=meu_banco_de_dados', 'usuario', 'senha');
        $sql = "SELECT * FROM tarefas";
        $stmt = $conexao->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p><strong>Tarefa:</strong> {$row['tarefa']}, <strong>Estado:</strong> {$row['estado']}</p>";
        }
        ?>
    </div>
</body>

</html>