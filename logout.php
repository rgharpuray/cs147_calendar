<?php
session_start();

//destroy everything associated with the session and redirect to login page
session_destroy();
header("location: register.php");
?>