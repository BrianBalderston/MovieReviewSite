<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();

	if(isset($_POST['submit']))
	{
		//echo "works";
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$level = $_POST['lvllist'];
		
		if(empty($level)) {
			//echo "Level not selected";
			$message = "Please select a user level.";
		}else{
			//echo "Level Selected";
			$result = createUser($fname, $lname, $username, $password, $level);
			$message = $result;
		}
		
	}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create User</title>
</head>
<body>
	<h1>Create User</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
		<label>First Name:</label>
		<input name="fname" type="text" value="<?php if(!empty($fname)){echo $fname;} ?>">
		<br><br>
		
		<label>Last Name:</label>
		<input name="lname" type="text" value="<?php if(!empty($lname)){echo $lname;} ?>">
		<br><br>
		
		<label>Username:</label>
		<input name="username" type="text" value="<?php if(!empty($username)){echo $username;} ?>">
		<br><br>
		
		<label>Password:</label>
		<input name="password" type="text" value="<?php if(!empty($password)){echo $password;} ?>">
		<br><br>
		<select name="lvllist">
			<option value="">Please Select User Level...</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="Create User"> <!--its not a bug that theres so many ubmits in here-->
	</form>
	<br><br>
	<a href="admin_index.php">Back to Admin Panel</a>
</body>
</html>