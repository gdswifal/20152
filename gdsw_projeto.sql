--
-- Cria o banco de dados
--
CREATE DATABASE GDSW_PROJETO DEFAULT CHARSET=latin1;
--
-- Cria a tabela TIPO_USUARIO
--
CREATE TABLE IF NOT EXISTS TIPO_USUARIO (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,	-- Código INTEGERerno (PK)
	TIPO VARCHAR(32) NOT NULL,			-- Descrição
	PRIMARY KEY(ID)					-- Define o campo ID como PK (Primary Key)
);
--
-- Cria a tabela USUARIOS
--
CREATE TABLE IF NOT EXISTS USUARIOS (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID usuário (PK)
	LOGIN VARCHAR(64) NOT NULL UNIQUE,			-- Nome com até 64 caracteres
	SENHA VARCHAR(9) NOT NULL,				-- Telefone, podendo ser nulo caso não tenha
	TIPO INTEGER UNSIGNED NOT NULL,					-- Tipo de usuário
	PRIMARY KEY(ID),						-- Define o campo ID como PK (Primary Key)
	FOREIGN KEY(TIPO) REFERENCES TIPO_USUARIO(ID)		-- Referencia a tabela TIPO_USUARIOS
);
--
-- Cria a tabela EXT_VOCAL
--
CREATE TABLE IF NOT EXISTS EXT_VOCAL (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- Código INTEGERerno (PK)
	TIPO VARCHAR(64) NOT NULL,				-- Nome com até 64 caracteres
	PRIMARY KEY(ID)						-- Define o campo ID como PK (Primary Key)
);
--
-- Cria a tabela MEMBROS
--
CREATE TABLE IF NOT EXISTS MEMBROS (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID dos membros (PK)
	NOME VARCHAR(64) NOT NULL,				-- Nome com até 64 caracteres
	FONE INTEGER(9) UNSIGNED NOT NULL,			-- Telefone de contato
	EMAIL VARCHAR(64) NULL,					-- E-mail dos membros
	EX_VOCAL INTEGER UNSIGNED NOT NULL,					-- Tipo da extensão vocal
	PRIMARY KEY(ID),					-- Define o campo ID como PK (Primary Key)
	FOREIGN KEY(EX_VOCAL) REFERENCES EXT_VOCAL(ID)		-- Cria o relacionamento (FK) com a tabela TIPO
);								
--
-- Cria a tabela TIPO_EVENTO
--
CREATE TABLE IF NOT EXISTS TIPO_EVENTO (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- Código INTEGERerno (PK)
	TIPO VARCHAR(64) NOT NULL,				-- Código do tipo
	PRIMARY KEY(ID)					-- Define o campo CODIGO como PK (Primary Key)
);
--
-- Cria a tabela EVENTOS
--
CREATE TABLE IF NOT EXISTS EVENTOS (
	ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,		-- ID do evento
	LOCAL VARCHAR(64) NOT NULL,				-- Local do evento
	HORA_DATA DATETIME,					-- Data e hora do evento
	PARTICIPANTES INTEGER UNSIGNED NOT NULL,			-- Participantes do evento
	TIPO INTEGER UNSIGNED NOT NULL,				-- Tipo do evento
	PRIMARY KEY(ID),					-- Define ID como chave primária
	FOREIGN KEY(TIPO) REFERENCES TIPO_EVENTO(ID)		-- Cria o relacionamento (FK) com a tabela TIPO_EVENTO
);

