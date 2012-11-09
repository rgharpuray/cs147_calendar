<?php
$con = mysql_connect("127.0.0.1","root","mysqlpass") or die (mysql_error());

/* Create database
if (mysql_query("CREATE DATABASE accounts",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }*/

// Create table
mysql_select_db("sportcal", $con);
$sql = "CREATE TABLE Users
(
user_id int NOT NULL AUTO_INCREMENT,
username varchar(100),
password varchar(100),
)";

mysql_select_db("sportcal", $con);
$sql = "CREATE TABLE Subscriptions
(
team_id int NOT NULL,
username varchar(100),
)";

// Execute query
mysql_query($sql,$con);

mysql_close($con);
?>

