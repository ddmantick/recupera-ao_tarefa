<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #3498db;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            margin-top: 30px;
        }

        h2 {
            text-align: center;
        }

        .tarefas {
            display: flex; 
            justify-content: space-around; 
            flex-wrap: wrap;
        }

        .tarefa {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 15px;
            width: 200px; 
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        select {
            margin-top: 10px; 
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="usuarios.php">Cadastro de Usuários</a></li>
                <li><a href="tarefas.php">Cadastro de Tarefas</a></li>
                <li><a href="gerenciar.php">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Gerenciamento de Tarefas</h2>
        <section class="tarefas" id="taskContainer">
            <!-- Tarefas serão inseridas dinamicamente aqui -->
        </section>

        <div class="tarefa">
            <h3>Adicionar Nova Tarefa</h3>
            <input type="text" id="newTaskDescription" placeholder="Descrição da nova tarefa" required />
            <button onclick="addTask()">Adicionar Tarefa</button>
        </div>

    </main>

    <script>
        // Array para armazenar tarefas
        let tasks = [
            { id: 1, description: "Tarefa 1", status: "A Fazer" },
            { id: 2, description: "Tarefa 2", status: "Fazendo" },
            { id: 3, description: "Tarefa 3", status: "Pronto" },
        ];

        // Função para renderizar as tarefas na tela
        function renderTasks() {
            const taskContainer = document.getElementById('taskContainer');
            taskContainer.innerHTML = '';  // Limpa o conteúdo atual
            tasks.forEach(task => {
                const taskElement = document.createElement('div');
                taskElement.classList.add('tarefa');
                taskElement.innerHTML = `
                    <h3>${task.status}</h3>
                    <p>Descrição: ${task.description}</p>
                    <button onclick="editTask(${task.id})">Editar</button>
                    <button onclick="deleteTask(${task.id})">Excluir</button>
                    <select onchange="changeStatus(${task.id}, this)">
                        <option value="A Fazer" ${task.status === "A Fazer" ? "selected" : ""}>A Fazer</option>
                        <option value="Fazendo" ${task.status === "Fazendo" ? "selected" : ""}>Fazendo</option>
                        <option value="Pronto" ${task.status === "Pronto" ? "selected" : ""}>Pronto</option>
                    </select>
                    <button onclick="updateStatus(${task.id})">Alterar Status</button>
                `;
                taskContainer.appendChild(taskElement);
            });
        }

        // Função para adicionar uma nova tarefa
        function addTask() {
            const taskDescription = document.getElementById('newTaskDescription').value;
            if (taskDescription) {
                const newTask = {
                    id: tasks.length + 1,  // Gerar um ID único
                    description: taskDescription,
                    status: 'A Fazer'
                };
                tasks.push(newTask);
                renderTasks();
                document.getElementById('newTaskDescription').value = '';  // Limpar o campo
            } else {
                alert('Por favor, insira uma descrição da tarefa.');
            }
        }

        // Função para editar a tarefa
        function editTask(id) {
            const task = tasks.find(task => task.id === id);
            const newDescription = prompt('Editar descrição da tarefa:', task.description);
            if (newDescription) {
                task.description = newDescription;
                renderTasks();
            }
        }

        // Função para excluir uma tarefa
        function deleteTask(id) {
            if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
                tasks = tasks.filter(task => task.id !== id);
                renderTasks();
            }
        }

        // Função para alterar o status da tarefa
        function changeStatus(id, selectElement) {
            const task = tasks.find(task => task.id === id);
            task.status = selectElement.value;
        }

        // Função para atualizar o status da tarefa
        function updateStatus(id) {
            alert('Status da tarefa ' + id + ' foi atualizado.');
        }

        // Inicializa as tarefas
        renderTasks();
    </script>

</body>
</html>
