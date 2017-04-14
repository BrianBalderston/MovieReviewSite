<?php
	include 'config.php';

	$mysqli = new mysqli($config['mysql_server'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);
	if ($mysqli->connect_errno) {
		printf("Connection failed: %s \n", $mysqli->connect_error);
		exit();
	}

	$mysqli->set_charset("utf8");

	// set some post stuff up here
	$movID = $_GET["movies_id"];	

	$myQuery = "SELECT * FROM tbl_movies WHERE movies_id = '$movID'";
	$result = mysqli_query($mysqli, $myQuery);
	$row = mysqli_fetch_assoc($result);	

	echo json_encode($row);
	//echo mysqli_num_rows($result);			
?>