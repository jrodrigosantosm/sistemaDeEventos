-- Script para criar a tabela de usuarios_anunciantes
CREATE TABLE usuarios_anunciantes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL
);

-- Script para criar a tabela de eventos
CREATE TABLE eventos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    id_criador INT NOT NULL,
    data DATE,
    FOREIGN KEY (id_criador) REFERENCES usuarios_anunciantes(id)
);

