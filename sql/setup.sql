CREATE TABLE IF NOT EXISTS setor (
	setor_codigo SERIAL PRIMARY KEY,
	descricao TEXT
);

CREATE TABLE IF NOT EXISTS pergunta (
	pergunta_codigo SERIAL PRIMARY KEY,
	descricao TEXT
);

CREATE TABLE IF NOT EXISTS dispositivo (
	dispositivo_codigo SERIAL PRIMARY KEY,
	descricao TEXT
);

CREATE TABLE IF NOT EXISTS avaliacao (
	avaliacao_codigo SERIAL PRIMARY KEY NOT NULL,
	setor_codigo INTEGER NOT NULL,
	dispositivo_codigo INTEGER NOT NULL,
	avaliacao SMALLINT NOT NULL,
	feedback TEXT,
	datahora TIMESTAMP NOT NULL,
	FOREIGN KEY (setor_codigo) REFERENCES setor(setor_codigo),
	FOREIGN KEY (dispositivo_codigo) REFERENCES dispositivo(dispositivo_codigo)
);

CREATE TABLE IF NOT EXISTS usuario (
	usuario_codigo SERIAL PRIMARY KEY NOT NULL,
	login TEXT NOT NULL,
	senha TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS respostasperguntas (
	avaliacao_codigo INTEGER NOT NULL,
	pergunta_codigo INTEGER NOT NULL,
	resposta TEXT,
	CONSTRAINT pk_avaliacaopergunta PRIMARY KEY (avaliacao_codigo, pergunta_codigo)
);


