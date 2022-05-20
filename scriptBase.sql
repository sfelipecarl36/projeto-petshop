create database petshopdb;

use petshopdb;
SET GLOBAL lc_time_names='pt_BR';

create table superadmins (
	id int primary key auto_increment,
    email varchar (70),
    senha varchar(15),
    status int(1)
);

insert into superadmins (email,senha) values ("superadmin@gmail.com","admin123");

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
    idade varchar(10),
    sexo varchar(1),
    tipo varchar (15),
    img varchar(70),
    peso numeric(15,2),
    raca varchar(15),
    deficiencia boolean,
    obs_deficiencia varchar(150),
    id_cliente int,
    CONSTRAINT id_cliente FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

create table funcionarios (
	id int primary key auto_increment,
	nome varchar (15),
    sobrenome varchar (15),
    sexo varchar(1),
    numero varchar(15),
    email varchar (70),
    senha varchar(15),
    cpf varchar(14)
);

create table tipo_consultas (
	id int primary key auto_increment,
    nome varchar(50),
    valor float(10)
);

create table funcao (
	id int primary key auto_increment,
    nome varchar(30),
    funcionario_fk int,
    FOREIGN KEY (funcionario_fk) references funcionarios(id),
    servico_fk int,
    FOREIGN KEY (servico_fk) references tipo_consultas(id)
);

insert into tipo_consultas (nome, valor) values ('Banho e Tosa', 50.49);
insert into tipo_consultas (nome, valor) values ('Atendimento Veterinário', 70.99);

create table status_consultas (
	id int primary key auto_increment,
    nome varchar(50)
);

insert into status_consultas (nome) values ('Em aberto');
insert into status_consultas (nome) values ('Atendido');
insert into status_consultas (nome) values ('Cancelado');

create table horarios_veterinario (
	id int primary key auto_increment,
	hora varchar(5),
    veterinario_fk int,
    foreign key (veterinario_fk) references funcionarios(id)
);

create table dias_funcionario (
	id int primary key auto_increment,
	dia varchar(10),
    veterinario_fk int,
    foreign key (veterinario_fk) references funcionarios(id)
);

create table consultas (
	id int primary key auto_increment,
    cliente_fk int,
    foreign key (cliente_fk) references clientes(id),
    paciente_fk int,
    foreign key (paciente_fk) references pets(id),
    funcionario_fk int,
    foreign key (funcionario_fk) references funcionarios(id),
    tipo_fk int,
    foreign key (tipo_fk) references tipo_consultas(id),
    data_abertura varchar(30),
    horario_consulta int,
    foreign key (horario_consulta) references horarios_veterinario(id),
    status_fk int,
    foreign key (status_fk) references status_consultas(id)
);