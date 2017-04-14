<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in(); //this is commented out to make it easier to test sites

	$tbl = "tbl_user";
	$users = getAll($tbl); //this is in read.php?

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete User</title>
</head>
<body>
	
	<h1>Delete User </h1>
	<?php
		while($row=mysqli_fetch_array($users))
		{
			echo "{$row['user_name']}<a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Delete this User</a><br>";
		}
	?>

</body>
</html>