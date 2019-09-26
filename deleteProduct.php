<?php



$host= "xxxxxxxxeecs.qub.ac.uk";
	$pw= "1ZRxxxScm6G8nR570xj";
	$db="xxxx";
	$user="x";

$mysqli= new mysqli($host,$user,$pw,$db);


if(isset($_GET['id'])){
	
	$img = $_GET['id'];
	mysqli_query($mysqli, "DELETE from product where id = '$img'");
	
	header( "location:account.php" );
	
}
 


?>
