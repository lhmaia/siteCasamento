CREATE TABLE pessoa
(
	id 			    INT NOT NULL AUTO_INCREMENT,
	nome 			VARCHAR (255) NOT NULL,
	email 			VARCHAR (255) NOT NULL,
	senha 			VARCHAR (15) NOT NULL,
	logradouro 		VARCHAR (255),
	bairro 			VARCHAR (255),
	cidade 			VARCHAR (255),
	estado 			CHAR (2),
	telefone 		VARCHAR(20),
	quemconvidou 	INT,
	
	CONSTRAINT pk_pessoaID PRIMARY KEY (id)
);

CREATE TABLE grupo
(
	id		INT NOT NULL AUTO_INCREMENT,
	nome	VARCHAR (255) NOT NULL,
	
	CONSTRAINT pk_grupoID PRIMARY KEY (id)
);

CREATE TABLE membros_grupos
(
	id_grupo	INT NOT NULL,
	id_pessoa	INT NOT NULL,
	
	CONSTRAINT pk_membros_grupos PRIMARY KEY (id_grupo, id_pessoa)
);