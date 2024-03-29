show databases;
create database sportcal;
use sportcal;

/*Create tables for high schools, students, colleges, and for students interested in certain colleges)*/
create table if not exists user(id int primary key auto_increment, username varchar(30) not null, password varchar(30), fullname varchar(200), hometown varchar(200));
create table if not exists team(id int primary key auto_increment, name varchar(100), league varchar(10), logourl varchar(200)); 
create table if not exists user_subscribesto_team(user_id int not null, FOREIGN KEY(user_id) REFERENCES user(id), team_id int not null, FOREIGN KEY(team_id) REFERENCES team(id));
create table if not exists game(id int primary key auto_increment, league varchar(10), home_team_id int not null, FOREIGN KEY(home_team_id) REFERENCES team(id), away_team_id int not null, FOREIGN KEY(away_team_id) REFERENCES team(id), gamedate date, gametime time); 
create table if not exists player(id int primary key auto_increment, league varchar(10), name varchar(30), team_id int not null, FOREIGN KEY(team_id) REFERENCES team(id));

insert into user(username, password, fullname) values('barty', 'haha', 'Bart Simpson');