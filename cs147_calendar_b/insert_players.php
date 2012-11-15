<?php
$con = mysql_connect("127.0.0.1","root","mysqlpass") or die (mysql_error());

mysql_select_db("sportcal", $con);

// Create table
mysql_select_db("sportcal", $con);
$sql = "CREATE TABLE Players
(
team_id int not null, FOREIGN KEY(team_id) REFERENCES team(id),
Name varchar(100),
)";

// Insert Players
mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('1', 'matt ryan')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('1', 'julio jones')");

mysql_query("INSERT INTO Players (team_id_id, Name)
VALUES ('2', 'tom brady')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('2', 'wes welker')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('3', 'tony romo')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('3', 'dez bryant')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('4', 'eli manning')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('4', 'victor cruz')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('5', 'isaac redman')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('5', 'ben roethlisberger')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('6', 'peyton manning')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('6', 'willis mcgahee')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('7', 'matt cain')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('7', 'buster posey')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('8', 'prince fielder')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('8', 'justin verlander')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('9', 'derek jeter')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('9', 'curtis granderson')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('10', 'david ortiz')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('10', 'josh beckett')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('11', 'coco crisp')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('11', 'josh reddick')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('12', 'josh hamilton')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('12', 'adrian beltre')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('13', 'kobe bryant')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('13', 'steve nash')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('14', 'chris paul')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('14', 'blake griffin')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('15', 'lebron james')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('15', 'dwayne wade')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('16', 'paul pierce')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('16', 'kevin garnett')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('17', 'kevin durant')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('17', 'russell westbrook')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('18', 'carmelo anthony')");

mysql_query("INSERT INTO Players (team_id, Name)
VALUES ('18', 'jason kidd')");


mysql_close($con);
?>