<!DOCTYPE html> 
<?php 
	include 'db_connect.php';
	include 'helpers.php';
	session_start();
	$error = "0";
			// username and password sent from form 
			$uname=$_POST['username']; 
			$password=$_POST['password'];

			if(isset($_POST['login']))
			{
				//To ensure that none of the fields are blank when submitting the form
				if($uname || $password != NULL)
				{
					// To protect MySQL injection
					$uname = stripslashes($uname);
					$password = stripslashes($password);
					$uname = mysql_real_escape_string($uname);
					$password = mysql_real_escape_string($password);

					//see if it's a student
					$student_entry="SELECT * FROM user WHERE username='$uname' and password='$password'";
					$student_result=mysql_query($student_entry);
					// Mysql_fetch_array to count table row (table row must be 1)
					$student_row=mysql_fetch_array($student_result);
				
					//Ensure username and password sent from form match those in the database
					if(mysql_num_rows($student_result) == 1 && mysql_num_rows($parent_result) < 1 && $student_row['username'] == $uname && $student_row['password'] == $password)
					{			
						//start a clean session and redirect to file "login_success.php"
						$_SESSION['username']= $uname;
						$_SESSION['password']= $password;
						$_SESSION['loggedIn']= "true";
						$_SESSION['id'] = $student_row['id'];
						
						header("Location: subscriptions.php");
					}
					else
					{
						$error = "Wrong username or password";
					}
				}
				else
				{
					$error = "Fields cannot be blank";
				}
			}
?>

<html>

<head>
	<title>GameTime</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 




<script type='text/javascript'>
			$(function(){
				$("#login").click(function() {
					$("#login_form").slideToggle();
				});
			});
			
			function newAccount()
			{
				dataString = $("#registration_form").serialize();
			        $.ajax({
			        type: "POST",
			        url: "process_registration.php",
			        data: dataString,
			        dataType: "json",
			        success: function(data) {
	          			$("#message_ajax").html("<div style='color:black;'>" + data.message + "</div></br>");
	   			   }
			   });   
			}
		</script>
<body> 


<div data-role="page" id="filter">
<!-- /header -->
<div data-role="header">
    <h1>Subscriptions</h1>
</div>

	<div data-role="content">	
				<form id="form1" name="form1" method="post" data-ajax="false" action="<?php $_SERVER['PHP_SELF'];?>">
				<b><legend style="font-size:24px;margin-top:0px;color:#083242;">Login</legend></b>
				</br>
					<p>
						<label for="username" style="font-size:18px;">Email/Username:</label>
						<td><input type="text" style="font-size:14px;" name="username" id="username" /></td>
					</p>
					<p>
						<label for="password" style="font-size:18px;">Password:</label></br>
						<input type="password" name="password" id="password" />
					</p>
					<p>
						<input class="button-link" type="submit" name="login" id="login" value="Log In" />
					</p>
				</form>
				</br>
				
				<form id="registration_form">
				<fieldset>
				<b><legend style="font-size:24px;margin-top:0px;color:#083242;">Create New Account</legend></b>
				</br>
				<div id="message_ajax" style="font-size:24px;"></div>
				<p>
				</p>
				<br />
				<p><label for="name" style="font-size:18px;">Name:</label>
				<input id="name" type="text" name="name" style="font-size:14px;" /></p>
				</br>
				<p><label for="email" style="font-size:18px;">E-mail:</label>
				<input id="email" type="text" name="email"  style="font-size:14px;" /></p>
				</br>
				<p><label for="new_password" style="font-size:18px;">Password:</label>
				<input id="new_password" type="password" name="new_password" style="font-size:14px;" /></p>
				</br>
				<p><label for="confirm_new_password" style="font-size:18px;">Confirm Password:</label>
				<input id="confirm_new_password" type="password" name="confirm_new_password" style="font-size:14px;" /></p>
				</br>
  <a href="#" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="a" onclick="newAccount(); return false" rel="external">Create New Account</a>
				</fieldset>
			</form>


	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="d">
		<ul>
			<li><a href="subscriptions.php" data-ajax="false" id="rss" data-icon="custom">Subscriptions</a></li>
			<li><a href="index.php" data-ajax="false" id="calendar" data-icon="custom">Calendar</a></li>
			<li><a href="maps.php" data-ajax="false" id="map" data-icon="custom">Maps</a></li>
			<li><a href="players.php" data-ajax="false" id="players" data-icon="custom">Players</a></li>
			<li><a href="register.php" data-ajax="false" id="players" data-icon="custom">Login/Register</a></li>
		</ul>
		</div>
	</div>
		
</div><!-- /page -->


</body>
</html>





