<?php
	require_once("phpscripts/init.php");
	//confirm_logged_in();

	$tbl = "tbl_movies";
	///$tbl="tbl_cast"; you could change it to this, and it adjusts itself... It configures itself to the content we want it to edit
	$col = "movies_id";
	$id = 1;
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit All</title>
</head>
<body>
	<h1>Edit All</h1>
	<?php single_edit($tbl,$col,$id); ?>
	<a href="admin_index.php">Back</a>

</body>
</html>