create database Pandora;

use Pandora;

create table adm(
	id int not null auto_increment,
	nome varchar(45) not null,
	email varchar(255) not null,
	cpf int not null,
	senha varchar(45) not null,
	primary key (id)
);

create table pagamento (
	id int not null auto_increment,
	nome varchar(45) not null,
	status varchar(45) not null,
	taxa decimal not null,
	primary key (id)
);

create table servico (
	id int not null auto_increment,
	nome varchar(45) not null,
	descricao varchar(2000) not null,
	duracao time not null,
	preco decimal(15,2) not null,
	primary key (id)
);

create table cliente (
	id int not null auto_increment,
	nome varchar(45) not null,
	celular int not null,
	email varchar(45) not null,
	cpf int not null,
	nascimento date not null,
	cidade varchar(45) not null,
	estado varchar(45) not null,
	pais varchar(45) not null,
	rua varchar(445) not null,
	numero int not null,
	bairro varchar(45) not null,
	cep int not null,
	complemento varchar(2000) not null,
	password varchar(45) not null,
	primary key (id)
);

create table profissional (
	id int not null auto_increment,
	nome varchar(45) not null,
	celular int not null,
	email varchar(45) not null,
	cpf int not null,
	nascimento date not null,
	cidade varchar(45) not null,
	estado varchar(45) not null,
	pais varchar(45) not null,
	rua varchar(445) not null,
	numero int not null,
	bairro varchar(45) not null,
	cep int not null,
	complemento varchar(2000) not null,
	password varchar(45) not null,
	salario decimal (15,2) not null,
	primary key (id)
);

create table agenda (
	id int not null auto_increment,
	data_hora datetime not null,
	pagamento varchar(45) not null,
	valor decimal(15,2) not null,
	cliente_id int not null,
	profissional_id int not null,
	servico_id int not null,
	pagamento_id int not null,
	primary key(id),
	constraint fk_agenda_cliente
		foreign key (cliente_id)
		references cliente(id),
	constraint fk_agenda_profissional
		foreign key (profissional_id)
		references profissional(id),
	constraint fk_agenda_servico
		foreign key (servico_id)
		references servico(id),	
	constraint fk_agenda_pagamento
		foreign key (pagamento_id)
		references pagamento(id)
);