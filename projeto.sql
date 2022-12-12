create database projeto;
use projeto;
create table agendamento (
id_servico int auto_increment primary key,
nome varchar(50),
telefone varchar(10),
horario varchar(5),
servico varchar(50),
data date );
create table funcionario (
id int auto_increment primary key,
nome varchar(30),
senha varchar(15),
cargo varchar(10) );
create table contato (
id  int auto_increment primary key,
nome varchar(50),
telefone varchar(10),
assunto varchar(20),
mensagem varchar(200),
data_mensagem date );
