<?php



$host="chealey01.lampt.eeecs.qub.ac.uk";
$user="chealey01";
$pw="1ZRScm6G8nR570xj";
$db="chealey01";

$mysqli= new mysqli($host,$user,$pw,$db);


if(isset($_GET['id'])){
	
	$img = $_GET['id'];
	mysqli_query($mysqli, "DELETE from product where id = '$img'");
	
	header( "location:account.php" );
	
}
 


?>
