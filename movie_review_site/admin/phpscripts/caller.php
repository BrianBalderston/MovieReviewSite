<?php
	require_once('init.php');

if(isset($_GET['caller_id'])){
	$dir = $_GET['caller_id'];
	//echo $dir;
	if($dir == "logout") {
		logged_out();
	}else if($dir == "delete") {
		$id = $_GET['id'];
		deleteUser($id);
	}
}


?>