create database dicionariomudo ;
use dicionariomudo;


create table tipoPalavra(
  codigo int auto_increment primary key,
  tipo varchar(45)
);

insert into tipoPalavra values(
  (null, "Frases Pequenas"),
  (null, "Comidas"),
  (null, "Animais"),
  (null, "Objetos"),
  (null, "Outros")

);

create table palavra(
  codigo int auto_increment primary key,
  nome varchar(45),
  linkImg varchar(45),
  linkVid varchar(45),
  tipoCodigo int,
  foreign key (tipoCodigo) references tipoPalavra(codigo)
);
