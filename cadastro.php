<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff;
            padding: 10px;
            display: flex;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .navbar a:hover {
            background-color: #0056b3;
        }
        .content {
            padding: 20px;
            display: none;
        }
        .content.active {
            display: block;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .priority-buttons {
            display: flex;
            gap: 10px;
        }
        .priority-buttons input {
            margin-right: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a onclick="showContent('cadastroUsuarios')">Cadastro de Usuários</a>
        <a onclick="showContent('cadastroTarefas')">Cadastro de Tarefas</a>
        <a onclick="showContent('gerenciarTarefas')">Gerenciar Tarefas</a>
    </div>

    <div id="cadastroUsuarios" class="content active">
        <h2>Cadastro de Tarefas</h2>
        <form id="formCadastroUsuario">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descrição">Descrição:</label>
                <input type="text" id="descrição" name="descrição" required>
            </div>
            <div class="form-group">
                <label for="Prioridade">Prioridade:</label>
                <div class="priority-buttons">
                    <label>
                        <input type="radio" name="Prioridade" value="Alta" required> Alta
                    </label>
                    <label>
                        <input type="radio" name="Prioridade" value="Média"> Média
                    </label>
                    <label>
                        <input type="radio" name="Prioridade" value="Baixa"> Baixa
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <div id="cadastroTarefas" class="content">
        <h2>Cadastro de Tarefas</h2>
        <p>Formulário para cadastrar tarefas aqui.</p>
    </div>

    <div id="gerenciarTarefas" class="content">
        <h2>Gerenciar Tarefas</h2>
        <p>Conteúdo para gerenciar tarefas aqui.</p>
    </div>

    <script>
        function showContent(id) {
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
        }

        document.getElementById("formCadastroUsuario").addEventListener("submit", function(event) {
            event.preventDefault();
            const titulo = document.getElementById("titulo").value;
            const descricao = document.getElementById("descrição").value;
            const prioridade = document.querySelector('input[name="Prioridade"]:checked').value;
            const usuario = document.getElementById("usuario").value;
            alert(`Tarefa "${titulo}" cadastrada com sucesso!\nDescrição: ${descricao}\nPrioridade: ${prioridade}\nUsuário: ${usuario}`);
            document.getElementById("formCadastroUsuario").reset();
        });
    </script>

</body>
</html>
