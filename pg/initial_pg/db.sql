\c hms;

CREATE TABLE usuarios (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(200),
  email VARCHAR(255),
  senha VARCHAR(100)
);

CREATE TABLE planos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(100),
  valor REAL
);

CREATE TABLE pacientes (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(255),
  cpf VARCHAR(11),
  rua VARCHAR(255),
  bairro VARCHAR(100),
  cidade VARCHAR(100),
  estado VARCHAR(100),
  cep VARCHAR(20),
  telefone VARCHAR(20),
  plano_id INTEGER NOT NULL,
  FOREIGN KEY (plano_id) REFERENCES planos (id)
);


CREATE TABLE medicos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(255),
  especialidades VARCHAR(255),
  crm INTEGER
);

CREATE TABLE consultas (
  paciente_id INTEGER NOT NULL,
  medico_id INTEGER NOT NULL,
  data_marcada TIMESTAMP,
  PRIMARY KEY (paciente_id, medico_id)
)
