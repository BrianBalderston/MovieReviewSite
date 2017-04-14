<?php
	require_once('phpscripts/init.php');
	ini_set('display_errors',1);
    error_reporting(E_ALL);
	
	$tbl = "tbl_cat";
	$catQuery = getAll($tbl);

	if(isset($_POST['submit'])) {
		$fimg = $_FILES['movie_fimg']['name'];
		//echo $fimg;
		$thumb = "TH_".$fimg;
		$title = $_POST['movie_title'];
		$year = $_POST['movie_year'];
		$storyline = $_POST['movie_storyline'];
		$runtime = $_POST['movie_runtime'];
		$trailer = $_POST['movie_trailer'];
		$price = $_POST['movie_price'];
		$cat = $_POST['catlist'];
		
		$uploadMovie = addMovie($fimg, $thumb, $title, $year, $storyline, $runtime, $trailer, $price, $cat);
		
		$message = $uploadMovie;
	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Movie</title>
</head>
<body>
<h1>Add Movie</h1>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_addMovie.php" method="post" enctype="multipart/form-data">
<label>Front Image:</label><br>
<input type="file" name="movie_fimg" value="" size="32"><br><br>
<label>Movie Title:</label><br>
<input type="text" name="movie_title" value="" size="32"<br><br>
<label>Movie Year:</label><br>
<input type="text" name="movie_year" value="" size="32"><br><br>
<label>Movie Storyline:</label><br>
<input type="text" name="movie_storyline" value="" size="32"><br><br>
<label>Movie Runtime:</label><br>
<input type="text" name="movie_runtime" value="" size="32"><br><br>
<label>Movie Trailer:</label><br>
<input type="text" name="movie_trailer" value="" size="32"><br><br>
<label>Movie Price:(Do not add '$', the system will add this in)</label><br>
<input type="text" name="movie_price" value="" size="32"><br><br>
<label>Select Category:</label><br>
<select name="catlist" required>
	<option value="">Please Select One...</option>
<?php
	while($row = mysqli_fetch_array($catQuery)) {
		echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
	}
?>
</select><br><br><br><br>
<input type="submit" name="submit" value="Add" >
</form>
</body>
</html>