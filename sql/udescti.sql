DROP DATABASE IF EXISTS udescti;

CREATE DATABASE udescti
	DEFAULT CHARACTER SET "utf8";

CREATE TABLE udescti.usuario (
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
	setor VARCHAR(30) NOT NULL,
	centro VARCHAR(30) NOT NULL,
	sala INT NOT NULL,
	CONSTRAINT local_pk PRIMARY KEY (setor,centro)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.equip_img (
	img_id TINYINT NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(15) NOT NULL,
	imagem LONGBLOB NOT NULL,
	CONSTRAINT equipimg_pk PRIMARY KEY (`img_id`)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.equipamento (
	patrimonio INT NOT NULL,
	servidor VARCHAR(30) NOT NULL,
	lsetor VARCHAR(30) NOT NULL,
	lcentro VARCHAR(30) NOT NULL,
	tipo VARCHAR(15) NOT NULL,
	descr TEXT NOT NULL,
	imagem TINYINT NOT NULL,
	CONSTRAINT equipamento_pk PRIMARY KEY (patrimonio),
	CONSTRAINT equipamento_servidor_fk FOREIGN KEY (servidor) REFERENCES udescti.servidor(nome),
	CONSTRAINT equipamento_local_fk FOREIGN KEY (lsetor, lcentro) REFERENCES udescti.local (setor, centro),
	CONSTRAINT equipamento_imagem_fk FOREIGN KEY (imagem) REFERENCES udescti.equip_img (img_id)
	) DEFAULT CHARSET=utf8;

CREATE TABLE udescti.historico (
	patrimonio INT NOT NULL,
	data DATE NOT NULL,
	hdescr TEXT NOT NULL,
	CONSTRAINT historico_pk PRIMARY KEY (patrimonio, data),
	CONSTRAINT historico_equipamento_fk FOREIGN KEY (patrimonio) REFERENCES udescti.equipamento(patrimonio)
	) DEFAULT CHARSET=utf8;