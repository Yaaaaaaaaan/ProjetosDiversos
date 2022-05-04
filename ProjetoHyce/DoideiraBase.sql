create database oitod617427697a;



create table colaborador(
	id_col int primary key not null AUTO_INCREMENT,
	nick varchar(25) unique not null,
	senha varchar(255) not null,
	email varchar(255) not null,
	rank int(1) not null
);

create table article(
 cod_art int primary key not null AUTO_INCREMENT,
 id_col_fk int,
 titulo varchar(255) not null,
 corpo mediumtext not null,
 status int(1) not null,
 dataedicao timestamp,
 datacriacao timestamp,
 foreign key (id_col_fk) references colaborador (id_col)
);

 /*create table colaboracao(
	id_cola int primary key not null AUTO_INCREMENT,
	id_col_fk int,
	cod_art_fk int,
	foreign key (id_col_fk) references colaborador (id_col), Para versões futuras. (edição em massa de notícias com um histórico de usuários que editaram.) 
	foreign key (cod_art_fk) references article (cod_art)
);
create table info(

);*/