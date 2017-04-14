<?php
	
	ini_set('display_errors',1);
    error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	if(isset($_GET['filter'])) {
		$tbl1 = "tbl_movies";
		$tbl2 = "tbl_cat";
		$tbl3 = "tbl_l_mc";
		$col1 = "movies_id";
		$col2 = "cat_id";
		$col3 = "cat_name";
		
		$rev1 = "tbl_reviews";
		$rev2 = "tbl_l_mr";
		
		$filter = $_GET['filter'];
		$getMovies = filterType($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
	
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Review Site</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
  </head>
<body>


<a href="admin/admin_login.php">User Login</a>
<br><br>


<section id="moreinfo" class="small-centered medium-centered small-12 medium-12 columns">
	<h2 class="hidden">*More Info*</h2>

	<h2 class=movietitle>*Movie Name*</h2>
	<h3 class="movieyear">*Movie Year*</h3>
	
	<!--<img src="images/trailer.png" alt="defaultTrailer">-->
	<section class="row">
     <h2 class="hidden">Movie Trailer</h2>
   <div id="section1" class="small-12 medium-10 columns">
       <video id="vid" controls class="show">
    			
    		<source src="video/trailer.mp4" type="video/mp4" class="movietrailer"></source>

    	</video>
	</div>
	    	<div id="webApp" class="hide"></div>
</section>
	
	
	
	<h2 class="moviedesc">*Description of movie*</h2>
	<p>Description of the movie goes here</p>
	<br>
	<h2 class="moviereviews">Reviews:</h2>
	<p>Show reviews where rev_movie = tbl_movies movies_id</p>
	<br>
	
	 <section class="row">
     <h2 class="hidden">Review</h2>
     
     
		<div id="reviewsection" class="small-10 small-pull-1 medium-offset-1 medium-10 medium-pull-1 columns">
			<h3 class="sectiontitle">Leave a Review:</h3>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label>Username:</label>
			<input name="name" type="text" placeholder="Enter your Name">
<br>
			<label>Your Review:</label>
			<textarea name="msg" placeholder="Enter your Message here"></textarea>

			<input type="submit" value="Send">
		</form>
		</div>
</section>
	

</section>



<?php

	include('includes/nav.html');
?>
	<section class="small-centered medium-centered small-12 medium-12 columns">
		<h1 class="h1title">Movies in Database:</h1>
    	<h2 class="hidden">Movies:</h2>
	<?php
	
	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies))
		{
			echo "<div id='themovies'class='small-6 medium-6 columns'>";
			
			echo "<img class=\"swapdetails\" src=\"images/{$row['movies_thumb']}\" alt=\"{$row['movies_title']}\">";
			
			echo "<h2 class='hidden'>Movie Name</h2>";
			echo "<h3 class=arraytitle>{$row['movies_title']}</h3>";
							 
			echo "<h2 class='hidden'>Movie Year</h2>";
			echo "<h4 class=arrayyear>{$row['movies_year']}</h4>";
			
			echo "<a class=\"swapdetails\" href=\"#\" \">More details...</a>";
					echo "<br><br><br><br>";
		}
	}else{
		echo "<p>{$getMovies}</p>";
	}
	
	include('includes/footer.html');
	
?>
	</section>
  
  
  <!--echo "<a href=\"details.php?id={$row['movies_id']}\">More details...</a>";-->
  
  
  
   
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    
    <script src="js/app.js"></script>
  </body>
</html>
