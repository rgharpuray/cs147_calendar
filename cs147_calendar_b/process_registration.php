<?php
include 'db_connect.php';

$email_check = '';
$return_arr = array();

$new_name = $_REQUEST['name'];
$username = $_REQUEST['email'];
$password = $_REQUEST['new_password'];

//check to make sure passwords match, and that username/email is not already taken.
$existing_results = mysql_query("SELECT * from user where username = '" . $username . "'");

$passwords_match = FALSE;
if($password == $_REQUEST['confirm_new_password'])
{
	$passwords_match = TRUE;
}

if(mysql_num_rows($existing_results) <= 0 && $passwords_match == TRUE && filter_var($username, FILTER_VALIDATE_EMAIL))
{	
		$new_user_query = "insert into user (username, password, fullname)  values ('" . $username . "', '" . $password . "', '" . $new_name . "');";
		if (!mysql_query($new_user_query, $con))
		{
			die('Error: ' . mysql_error());
		}
		$message = "Congratulations " . $new_name . ". Welcome to GameTime!";
		$return_arr["success"] = 1;
		$return_arr["account_type"] = "student";
		
		//add testing deadlines for this user based on the range of testing deadlines
		$user_id = mysql_insert_id();
		
		//auto-login user upon registration
		$_SESSION['username']= $username;
		$_SESSION['password']= $password;
		$_SESSION['loggedIn']= "true";
		$_SESSION['id'] = $user_id;
}
else
{
	$return_arr["success"] = 0;
	if(mysql_num_rows($existing_results) > 0 && $passwords_match == TRUE)
	{
		$message = "Sorry, this email already has an account. Try again!";
	}
	else if(mysql_num_rows($existing_results) <= 0 && $passwords_match == FALSE)
	{
		$message = "Sorry, the passwords didn't match. Try again!";
	}
	else if(mysql_num_rows($existing_results) > 0 && $passwords_match == FALSE)
	{
		$message = "Sorry, this email already has an account, and the passwords didn't match. Try again!";
	}
	else if(!filter_var($username, FILTER_VALIDATE_EMAIL))
	{
		$message = "Please enter a properly formatted email address!";
	}
	else
	{
		$message = "Sorry, an unknown error occured. Try again!";
	}
}

$return_arr["email"] = $_REQUEST['email'];
$return_arr["message"] = $message;
echo json_encode($return_arr);

?>
