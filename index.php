<?php

$host= "xxxxxxxxeecs.qub.ac.uk";
	$pw= "1ZRxxxScm6G8nR570xj";
	$db="xxxx";
	$user="x";
$mysqli = new mysqli($host,$user,$pw,$db);
$result = $mysqli->query("SELECT * FROM product");

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
</head><header>

	<div class="container-fluid">
		<div class="row ">
			
<a id="headerImage" href = "index.php"> <img src="images/Header.JPG" /></a>
   <form action="search.php" method="GET">
	<div id="newbar" class="12 columns sm">
	
		<input id="newbar"type="text" name='search' placeholder="Search">
		<input id="newbar"type="submit" name="form_submit"  value="search">
		</form>
		
</div>
<div class="container-fluid">
				<ul id="navlist" >
					
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="Registration.php">Register</a>
					<a  id="x" 	class="button" href="Login.php">login</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
	
	</ul>
	</div></div>
		</div>
			
</header>
</h1>


</div>


<!-- .container is main centered wrapper -->

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
<div class="container-fluid">
<div class="column col-12 ">
		<div class="row">
		
		<div  class="container">

<?php


	while($row=$result->fetch_assoc()){
	
		$id=$row['id'];
		$name=$row['title'];
		$price=$row['price'];
		$Posted=$row['Posted'];
		$details=$row['details'];
		$imgpath=$row['imgpath'];
		
	
	echo "
	<div  class='container'>
	<div id='rows' class='row'>
  <div class='columns'>
    <div id='titleAcc' class='col s5 m10'><h5>$name  :  £$price</div>
	</div>
   <div class='row'>
<p> <a id='categoryimage' class='five columns'><img src=images/$imgpath width='70%' /></a>
	 $details</p>
      <p>DatePosted: $Posted </p>
<a class='button' id='Categories' href='Login.php'>Buy</a>
	

	  </div>
</div>


</div>
";

}
?>
	
</div>

		









</html>
