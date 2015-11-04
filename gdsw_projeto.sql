--
-- Cria o banco de dados
--
CREATE DATABASE GDSW_PROJETO DEFAULT CHARSET=latin1;
--
-- Cria a tabela TIPO_USUARIO
--
CREATE TABLE IF NOT EXISTS TIPO_USUARIO (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,	-- Código INTEGERerno (PK)
	tipo VARCHAR(32) NOT NULL,			-- Descrição
	PRIMARY KEY(ID)					-- Define o campo ID como PK (Primary Key)
);
--
-- Cria a tabela USUARIOS
--
CREATE TABLE IF NOT EXISTS USUARIOS (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID usuário (PK)
	usuario VARCHAR(64) NOT NULL UNIQUE,			-- Nome com até 64 caracteres
	senha VARCHAR(9) NOT NULL,				-- Telefone, podendo ser nulo caso não tenha
	tipo INTEGER UNSIGNED NOT NULL,					-- Tipo de usuário
	PRIMARY KEY(ID),						-- Define o campo ID como PK (Primary Key)
	FOREIGN KEY(TIPO) REFERENCES TIPO_USUARIO(ID)		-- Referencia a tabela TIPO_USUARIOS
);
--
-- Cria a tabela EXT_VOCAL
--
CREATE TABLE IF NOT EXISTS EXT_VOCAL (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- Código INTEGERerno (PK)
	tipo VARCHAR(64) NOT NULL,				-- Nome com até 64 caracteres
	PRIMARY KEY(ID)						-- Define o campo ID como PK (Primary Key)
);
--
-- Cria a tabela MEMBROS
--
CREATE TABLE IF NOT EXISTS MEMBROS (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID dos membros (PK)
	nome VARCHAR(64) NOT NULL,				-- Nome com até 64 caracteres
	fone INTEGER(9) UNSIGNED NOT NULL,			-- Telefone de contato
	email VARCHAR(64) NULL,					-- E-mail dos membros
	ex_vocal INTEGER UNSIGNED NOT NULL,			-- Tipo da extensão vocal
	end VARCHAR(64) NOT NULL,				-- Endereços dos membros
	PRIMARY KEY(ID),					-- Define o campo ID como PK (Primary Key)
	FOREIGN KEY(EX_VOCAL) REFERENCES EXT_VOCAL(ID)		-- Cria o relacionamento (FK) com a tabela TIPO
);								
--
-- Cria a tabela TIPO_EVENTO
--
CREATE TABLE IF NOT EXISTS TIPO_EVENTO (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- Código INTEGERerno (PK)
	tipo VARCHAR(64) NOT NULL,				-- Código do tipo
	PRIMARY KEY(ID)					-- Define o campo CODIGO como PK (Primary Key)
);
--
-- Cria a tabela EVENTOS
--
CREATE TABLE IF NOT EXISTS EVENTOS (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID do evento
	local VARCHAR(64) NOT NULL,				-- Local do evento
	hora_data DATETIME,					-- Data e hora do evento
	participantes INTEGER UNSIGNED NOT NULL,		-- Participantes do evento
	tipo INTEGER UNSIGNED NOT NULL,				-- Tipo do evento
	PRIMARY KEY(ID),					-- Define ID como chave primária
	FOREIGN KEY(TIPO) REFERENCES TIPO_EVENTO(ID)		-- Cria o relacionamento (FK) com a tabela TIPO_EVENTO
);

