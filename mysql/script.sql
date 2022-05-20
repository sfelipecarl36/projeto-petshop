create database petshopdb;

use petshopdb;

create table clientes (
	id int primary key auto_increment,
	nome varchar (15),
    sobrenome varchar (15),
    sexo varchar(1),
    numero varchar(15),
    email varchar (70),
    senha varchar(15),
    cpf varchar(14),
    cidade varchar(15),
    endereco varchar(70),
    bairro varchar(15),
    numero_endereco varchar(6),
    cep varchar(9),
    complemento_endereco varchar (40)
);

create table pets(
	id int primary key auto_increment,
	nome varchar (15),
    sobrenome varchar (15),
    idade varchar(3),
    tipo varchar (15),
    img varchar(70),
    peso numeric(15,2),
    raca varchar(15),
    deficiencia boolean,
    obs_deficiencia varchar(150),
    id_cliente int,
    CONSTRAINT id_cliente FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);