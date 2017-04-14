<?php

function deleteUser($id)
{
	include('connect.php');

	$delstring = "DELETE FROM tbl_user WHERE user_id={$id}";
	$delquery = mysqli_query($link, $delstring);

	if($delquery){
		redirect_to("../admin_index.php");
	}else{
		$message = "This user is protected.";
		echo $message;
	}

	mysqli_close($link);

}



function editUser($id, $fname, $lname, $username, $password)
{
	include('connect.php'); ////because require_once gets used twice so things break...
	
	$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_lname='{$lname}', user_name='{$username}', user_pass='{$password}' WHERE user_id={$id}";
	$updatequery = mysqli_query($link, $updatestring);
	
	if($updatequery) {
		redirect_to("admin_index.php");
	}else{
		$message = "There was a problem changing your user account settings. Please contact your web admin.";
		return $message;
	}
	
	
	mysqli_close($link);
}





function getUser($id)
{
	require_once('connect.php');
	$userstring = "SELECT * FROM tbl_user WHERE user_id={$id}";
	$userquery = mysqli_query($link, $userstring);
	
	if($userquery) {
		//fetch
		$found_user = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
		//return to $popForm
		return $found_user;
	}else{
		$message = "There was a problem changing your account. Please contact the web admin for help.";
		return $message;
	}
	
	mysqli_close($link);
}



	function createUser($fname, $lname, $username, $password, $level)
	{
		require_once("connect.php");
		$ip = 0;
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$lname}','{$username}','{$password}','{$level}','{$ip}')";
			///echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery)
		{
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem setting up this user";
			return $message;
		}
		mysqli_close($link);
	}




?>