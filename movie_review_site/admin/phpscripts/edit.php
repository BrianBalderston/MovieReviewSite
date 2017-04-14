<?php

	include("connect.php");

	$count=0;
	$tbl = $_POST['tbl'];
	$col = $_POST['col'];
	$id = $_POST['id'];

	unset($_POST['tbl']);
	unset($_POST['col']);
	unset($_POST['id']);
	
	$num = count($_POST);

	$qstring = "UPDATE {$tbl} SET "; ////we need that little space after SET. Its intentional

	foreach($_POST as $key => $value){
		$count++;
		if($count != $num){
			$qstring .= $key." = '".$value."', ";  ////.= is += for this language
		}else{
			$qstring .= $key." = '".$value."' ";
		}
	}

	$qstring .= "WHERE {$col}={$id}";

	//echo $qstring;

	$updateQuery = mysqli_query($link, $qstring);

	if($updateQuery) {
		header("Location: ../../index.php");
	}else{
		echo "Something went wrong with the movie, sorry";
	}

	mysqli_close($link);
?>