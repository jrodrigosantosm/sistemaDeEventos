-- Criação da tabela de artes marciais
CREATE TABLE artes_marciais (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) UNIQUE
);

-- Inserção de alguns exemplos de artes marciais
INSERT INTO artes_marciais (nome) VALUES 
('Jiu-Jitsu'),
('Muay Thai'),
('Karate'),
('Taekwondo');

-- Criação da tabela de graduações
CREATE TABLE graduacoes (
    id SERIAL PRIMARY KEY,
    id_arte_marcial INTEGER REFERENCES artes_marciais(id),
    graduacao VARCHAR(50)
);

-- Inserção de alguns exemplos de graduações para diferentes artes marciais
INSERT INTO graduacoes (id_arte_marcial, graduacao) VALUES 
(1, 'Faixa Branca'),
(1, 'Faixa Azul'),
(1, 'Faixa Roxa'),
(1, 'Faixa Marrom'),
(1, 'Faixa Preta'),
(2, 'Nak Muay'),
(2, 'Prachan'),
(3, '10º Kyu'),
(3, '9º Kyu'),
(3, '8º Kyu'),
(4, '10º Gup'),
(4, '9º Gup'),
(4, '8º Gup');

-- Criação da tabela de usuários
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(100),
    data_nascimento DATE,
    telefone VARCHAR(20),
    id_arte_marcial INTEGER REFERENCES artes_marciais(id),
    id_graduacao INTEGER REFERENCES graduacoes(id)
);
