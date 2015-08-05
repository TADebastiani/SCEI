DROP DATABASE IF EXISTS udescti;

CREATE DATABASE IF NOT EXISTS udescti
	DEFAULT CHARACTER SET "utf8";

CREATE TABLE udescti.user (
	user_id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(30) NOT NULL,
	login VARCHAR(10) NOT NULL,
	password VARCHAR(40) NOT NULL,
	email VARCHAR(50) NOT NULL,
	root ENUM('Y','N') NOT NULL,
	CONSTRAINT user_pk PRIMARY KEY (user_id),
	CONSTRAINT UNIQUE KEY (login)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.servidor (
	nome VARCHAR(30) NOT NULL,
	cargo VARCHAR(30) NOT NULL,
	CONSTRAINT servidor_pk PRIMARY KEY (nome)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.local (
	sala INT NOT NULL,
	centro VARCHAR(30) NOT NULL,
	setor VARCHAR(30) NOT NULL,
	CONSTRAINT local_pk PRIMARY KEY (sala)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.item (
	patrimonio INT NOT NULL,
	servidor VARCHAR(30) NOT NULL,
	local INT NOT NULL,
	tipo VARCHAR(15) NOT NULL,
	descr TEXT NOT NULL,
	CONSTRAINT item_pk PRIMARY KEY (patrimonio),
	CONSTRAINT item_servidor_fk FOREIGN KEY (servidor) REFERENCES udescti.servidor(nome),
	CONSTRAINT item_local_fk FOREIGN KEY (local) REFERENCES udescti.local(sala)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.historico (
	patrimonio INT NOT NULL,
	data DATE NOT NULL,
	hdescr TEXT NOT NULL,
	CONSTRAINT historico_pk PRIMARY KEY (patrimonio, data),
	CONSTRAINT historico_item_fk FOREIGN KEY (patrimonio) REFERENCES udescti.item(patrimonio)
	) DEFAULT CHARSET=utf8;