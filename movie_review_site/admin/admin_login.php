<?php
/*
	ini_set('display_errors',1);
error_reporting(E_ALL);

///////error reporting for macs
*/
require_once("phpscripts/init.php");

$ip = $_SERVER["REMOTE_ADDR"];
//echo $ip;
if(isset($_POST['submit']))
{
	//echo "Thanks for clicking...";	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if($username != "" && $password != ""){
		$result = logIn($username, $password, $ip);
		$message = $result;
	}else{
		$message = "Please fill in the required fields.";
	}
	
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Client Login</title>
</head>
<body>

	<h1>Content Management System Login</h1>
	
	<a href="../index.php">Home</a>
	<br>
	
	<?php if (!empty($message)){echo $message;} ?>
	<form action="admin_login.php" method="post">
		<label>Username:</label>
		<input type="text" name="username" value="">
		<label>Password:</label>
		<input type="password" name="password" value="">
		<input type="submit" name="submit" value="Go!">
	</form>

</body>
</html>