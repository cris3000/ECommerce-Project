 <?php
session_start();

	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
	

$mysqli = new mysqli($host,$user,$pw,$db);
$result = $mysqli->query("SELECT * FROM product WHERE category = 'Electronics' AND visibility='Public'");

if($mysqli->connect_errno){
	echo "Connect Error".$mysqli->connect_error;
}


?>

<!DOCTYPE>	

<html>

<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
<link rel="stylesheet" href="styles.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<head>

<title> ElmTree</title>
</head>
<header>

	<div class="container-fluid">

			
	<a id="headerImage" href ="index.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a  id="x" 	class="button" href="account.php">Account</a>
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="Login.php">login</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" 	class="button" href="Registration.php">Register</a>
	
	</ul>
	<form action="search.php" method="GET">
	<div id="newbar" class="12 columns sm">
	<input type="text" name='search' placeholder="Enter Search">
		<input type="submit"  name="form_submit"  value="Search">
		
		</form>
	</div>
	
	<div class="column ten xs">
	<div id="RowNav" class="row">
	
	<ul id="list">
		<a class="button" id="Categories" href="Clothing.php">Clothing</a>
		<a class="button"id="Categories" href="Books.php">Books</a>
		<a class="button"id="Categories" href="Electronics.php">Electronics</a>
		</ul>
	</div>
</div>

</div>
	
		
</header>
</h1>
<div  class="container">


	</br></br>
	</br></br>
<h4 id='clothing' >Electronics</h4>

<?php

	while($row=$result->fetch_assoc()){
	
		$id=$row['id'];
		$title=$row['title'];
		$price=$row['price'];
		$Posted=$row['Posted'];
		$details=$row['details'];
		$imgpath=$row['imgpath'];
		
	
	echo "

<div  class='container'>
	<div class='row'>
  <div id='rows' class='columns'>
    <div id='titleAcc' class='col s5 m10'><h5>$title  :  £$price</div>
	</div>
   <div class='row'>
 <a id='categoryimage' class='five columns'><img src=images/$imgpath width='70%'/></a> 
	<p> $details</p>
      <p>DatePosted: $Posted </p>
	  
	 <a class='button' href='Electronics2.php?row=$id'>Buy </a>
     <input type='hidden' name='key' value='$id'>
	
	  </div>
</div>


</div>
";

}
?>

	
</div>


</body>
