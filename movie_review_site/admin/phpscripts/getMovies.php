<?php
	require_once("connect.php");


if(isset($_GET['srch'])){
	$srch = $_GET['srch'];
	$movieQuery = "SELECT movies_id, movies_title, movies_thumb, movies_year FROM tbl_movies WHERE movies_title LIKE '$srch%' ORDER BY movies_title ASC";
$getMovies=mysqli_query($link, $movieQuery);
}else{
$movieQuery = "SELECT movies_id, movies_title, movies_thumb, movies_year FROM tbl_movies ORDER BY movies_title ASC";
$getMovies=mysqli_query($link, $movieQuery);
}
	
$jsonResult="[";
while($movResult = mysqli_fetch_assoc($getMovies))
{
	$jsonResult.=json_encode($movResult).",";
}

$jsonResult.="]"; /////.= is the php equivalent to +=
//substr_replace(string,replace,start,length);
$jsonResult = substr_replace($jsonResult,'',-2,1);
echo $jsonResult;



?>