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

#endscript

#select between CURRENT_DATE()+10 AND CURRENT_DATE();
select DATE(now());
select date_add(date(now()), interval 1 day) as "dataoption" where dayname(date_add(date(now()), interval 1 day)) in (select dias_funcionario.dia from dias_funcionario inner join funcionarios on dias_funcionario.veterinario_fk = funcionarios.id where funcionarios.id = 1);

select * from consultas;
select * from tipo_consultas;
select * from funcionarios;
select * from funcao;
select * from horarios_veterinario;
select * from dias_funcionario;
select * from clientes;
select * from pets;
select * from status_consultas;

delete from funcao where funcionario_fk = 2;
delete from dias_funcionario where veterinario_fk = 2;
delete from horarios_veterinario where veterinario_fk = 2;
delete from funcionarios where id = 2;

select date(now());

select * from horarios_veterinario;
select * from funcionarios inner join funcao on funcao.funcionario_fk=funcionarios.id inner join tipo_consultas on tipo_consultas.id = funcao.servico_fk where funcao.servico_fk = 2;
select funcionarios.id as idVet, funcionarios.nome as nomeVet, funcionarios.sobrenome as sobrenomeVet from funcionarios inner join funcao on funcao.funcionario_fk=funcionarios.id inner join tipo_consultas on tipo_consultas.id = funcao.servico_fk where funcao.servico_fk = 2;

use petshopdb;
drop table superadmins;
drop table consultas;
drop table pets;
drop table clientes;
drop table horarios_veterinario;
drop table dias_funcionario;
drop table funcao;
drop table funcionarios;
drop table status_consultas;
drop table tipo_consultas;

insert into consultas (cliente_fk, paciente_fk, tipo_fk, funcionario_fk, data_abertura, horario_consulta) values (1, 1, 2, 1, "2022-05-13", "08:00");

use petshopdb;
select horarios_veterinario.hora from horarios_veterinario right outer join funcionarios on horarios_veterinario.veterinario_fk = funcionarios.id inner join consultas on consultas.horario_consulta <> horarios_veterinario.hora and consultas.funcionario_fk = funcionarios.id where funcionarios.id = 1;
select * from consultas;

#debugger
select horarios_veterinario.hora from horarios_veterinario 
inner join funcionarios
on horarios_veterinario.veterinario_fk = funcionarios.id
inner join consultas
where funcionarios.id = 2
and horarios_veterinario.hora not in 
(SELECT horario_consulta FROM consultas where data_abertura = "2022-05-20")
order by horarios_veterinario.hora;

select * from consultas;
select distinctrow nome from funcao;

#SQL FUNCIONAL DA HORA
select distinct horarios_veterinario.hora from horarios_veterinario 
inner join funcionarios
on horarios_veterinario.veterinario_fk = funcionarios.id
inner join consultas 
on horarios_veterinario.hora != consultas.horario_consulta
where funcionarios.id = 1
and horarios_veterinario.hora not in 
(SELECT horario_consulta FROM consultas);

delete from consultas where horario_consulta = 8;
select * from consultas;
select * from horarios_veterinario;
select tipo_consultas.nome as tipoconsulta, pets.nome as petnome,pets.sobrenome as petsobrenome, horarios_veterinario.hora as horario, funcionarios.nome as profissionalnome, funcionarios.sobrenome as profissionalsobrenome, consultas.data_abertura as data_ab, consultas.horario_consulta as hora, status_consultas.nome as status from consultas inner join tipo_consultas on consultas.tipo_fk = tipo_consultas.id inner join funcionarios on consultas.funcionario_fk = funcionarios.id inner join pets on consultas.paciente_fk = pets.id inner join status_consultas on consultas.status_fk = status_consultas.id inner join horarios_veterinario on consultas.horario_consulta = horarios_veterinario.id where cliente_fk = 1;

select distinct horarios_veterinario.id, horarios_veterinario.hora from horarios_veterinario 
                            inner join funcionarios
                            on horarios_veterinario.veterinario_fk = funcionarios.id
                            where funcionarios.id = 1;

#horarios disponiveis em uma determinada data, conforme veterinario e consultas não abertas
select distinct horarios_veterinario.hora, horarios_veterinario.id from horarios_veterinario 
inner join funcionarios
on horarios_veterinario.veterinario_fk = funcionarios.id
inner join consultas
where funcionarios.id = 1
and horarios_veterinario.hora not in 
(SELECT horarios_veterinario.hora FROM horarios_veterinario
inner join consultas
on consultas.horario_consulta = horarios_veterinario.id
where consultas.data_abertura = "2022-05-17" and consultas.funcionario_fk=1
and consultas.status_fk = 1 order by horarios_veterinario.hora);

#horarios disponiveis de um funcionario
select horarios_veterinario.hora from horarios_veterinario
                            inner join funcionarios
                            on horarios_veterinario.veterinario_fk = funcionarios.id
                            where funcionarios.id = 2;
                            
#agendamentos (em texto)
select tipo_consultas.nome as tipoconsulta, pets.nome as petnome,pets.sobrenome as petsobrenome, horarios_veterinario.hora as horario, funcionarios.nome as profissionalnome, funcionarios.sobrenome as profissionalsobrenome, consultas.data_abertura as data_ab, consultas.horario_consulta as hora, status_consultas.nome as status from consultas inner join tipo_consultas on consultas.tipo_fk = tipo_consultas.id inner join funcionarios on consultas.funcionario_fk = funcionarios.id inner join pets on consultas.paciente_fk = pets.id inner join status_consultas on consultas.status_fk = status_consultas.id inner join horarios_veterinario on consultas.horario_consulta = horarios_veterinario.id where cliente_fk = 1 order by consultas.id desc;

#dashboard sql
select
  (select count(*) from clientes) as clientes,
  (select count(*) from pets) as pets,
  (select count(*) from funcionarios) as funcionarios,
  (select count(*) from consultas) as consultas,
  (select count(*) from consultas where status_fk = 2) as atendidos,
  (select count(*) from consultas where status_fk = 3) as cancelados;
  
  
