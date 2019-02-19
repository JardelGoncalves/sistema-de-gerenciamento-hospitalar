\c hms;

CREATE TABLE usuarios (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(200) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(100) NOT NULL
);

CREATE TABLE planos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  valor REAL NOT NULL
);

CREATE TABLE pacientes (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  rua VARCHAR(255) NOT NULL,
  bairro VARCHAR(100) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  estado VARCHAR(100) NOT NULL,
  cep VARCHAR(20) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  plano_id INTEGER NOT NULL,
  FOREIGN KEY (plano_id) REFERENCES planos (id)
);


CREATE TABLE medicos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  especialidades VARCHAR(255) NOT NULL,
  crm INTEGER NOT NULL
);

CREATE TABLE consultas (
  paciente_id INTEGER NOT NULL,
  medico_id INTEGER NOT NULL,
  data_marcada TIMESTAMP NOT NULL,
  PRIMARY KEY (paciente_id, medico_id)
)
