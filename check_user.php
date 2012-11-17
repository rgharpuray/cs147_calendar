<?php

//Declarations
$host="127.0.0.1";
$username="";
$password=""; 
$db_name="sportcal"; 
$tbl_name="Users";

// Connect to server and select databse.
mysql_connect("127.0.0.1","root","mysqlpass")or die (mysql_error());

mysql_select_db("sportcal", $con);

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
	{	
	// Register $myusername, $mypassword and redirect to file 	"login_success.php"
	session_register("myusername");
	session_register("mypassword"); 
	header("location:login_success.php");
	}
else 
	{
	echo "Wrong Username or Password";
	}
?>