create database DB_prova01
use DB_prova01

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    usuario_id INT,
    prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
    status ENUM('A Fazer', 'Fazendo', 'Pronto') DEFAULT 'A Fazer',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);


