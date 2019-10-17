create database engenharia;
use engenharia;

create table tipoAnimal(
codigo int auto_increment primary key,
tipo varchar(45)
);

create table animais(
codigo int auto_increment primary key,
nome varchar(45),
linkImg varchar(45),
linkVid varchar(45),
tipoCodigo int,
foreign key (tipoCodigo) references tipoAnimal(codigo)
);

create table tipoGestos(
codigo int auto_increment primary key,
tipo varchar(45)
);

create table gestos(
codigo int auto_increment primary key,
nome varchar(45),
linkImg varchar(45),
linkVid varchar(45),
tipoCodigo int,
foreign key (tipoCodigo) references tipoComida(codigo)
);
