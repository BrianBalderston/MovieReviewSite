<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();

$id = $_SESSION['users_id'];
//echo $id;
$popForm = getUser($id);
//echo $popForm;

if(isset($_POST['submit']))
	{
		//echo "works";
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		$result = editUser($id, $fname, $lname, $username, $password);
		$message = $result;
		}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit User</title>
</head>
<body>
	<h1>Edit User</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label>First Name:</label>
		<input name="fname" type="text" value="<?php echo $popForm['user_fname'] ?>">
		<br><br>
		
		<label>Last Name:</label>
		<input name="lname" type="text" value="<?php echo $popForm['user_lname'] ?>">
		<br><br>
		
		<label>Username:</label>
		<input name="username" type="text" value="<?php echo $popForm['user_name'] ?>">
		<br><br>
		
		<label>Password:</label>
		<input name="password" type="text" value="<?php echo $popForm['user_pass'] ?>">
		<br><br>

		<br><br>
		<input type="submit" name="submit" value="Edit User"> <!--its not a bug that theres so many ubmits in here-->
	</form>
	<br><br>
	<a href="admin_index.php">Back to Admin Panel</a>
</body>
</html>