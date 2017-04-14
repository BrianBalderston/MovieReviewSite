<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in(); //this is commented out to make it easier to test sites
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to your Admin Panel</title>
</head>

<body>
	<h1>Welcome <?php //echo $_SESSION['users_name']; ?> to your admin panel</h1>
	<a href="admin_createuser.php">Create User</a>
	<a href="admin_edituser.php">Edit User</a>
	<a href="phpscripts/single_edit_form.php">Edit Film</a>
	<br>
	<a href="phpscripts/caller.php?caller_id=logout">Log Out</a>
</body>
</html>