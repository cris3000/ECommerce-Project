<?php
session_start();
$name=[$_SESSION['40242807_id']];

	if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
   }
	$displayid =$_GET['row'];
	
	$host= "chealey01.lampt.eeecs.qub.ac.uk";	
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
	

$mysqli = new mysqli($host,$user,$pw,$db);
$result = $mysqli->query("SELECT  DISTINCT *from product  join users on product.UserID=users.id WHERE  product.id= '$displayid'");


	

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
			
<a id="headerImage" href ="welcome.php"> <img src="images/Header.JPG" /></a>
  <form action="search.php" method="GET">
	<div id="newbar" class="12 columns sm">
	<input type="text" name='search' placeholder="Enter Search">
		<input type="submit"  name="form_submit"  value="Search">
		
		</form>
</div>
<div class="container-fluid">
				<ul id="navlist" >

					<a  id="x" 	class="button" href="account.php">Account</a>
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="Login.php">Login</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
	
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
  <form action='Books1.php'  method='POST'>
  	</br></br>
	</br></br>
  <h4 id='clothing' >Books</h4>


<?php

	while($row=$result->fetch_assoc()){
	
		$id=$row['id'];
		$title=$row['title'];
		$price=$row['price'];
		$Posted=$row['Posted'];
		$details=$row['details'];
		$imgpath=$row['imgpath'];
		$seller=$row['name'];
		

			
			if (!isset($_POST['purchase']) ){
				$sql_reg= "INSERT INTO OrderPurchase (id, title, details, price,UserID, date)
			VALUES (null, '$title', '$details','$price', '$name[0]', NOW())";
				if($mysqli->query($sql_reg) === true){
		
					header( "refresh:4;url=deleteProduct.php?id=$row[id]" );
				}	
				else{
					echo "<h4>Error</h4>";
				}
		}
				
	echo "
	<div  class='container'>
	<div id='rows' class='row'>
  <div class='columns'>
    <div id='titleAcc' class='col s5 m10'><h5>$title  :  £$price</div>
	</div>
   <div class='row'>
<p> <a id='categoryimage' class='five columns'><img src=images/$imgpath width='70%'  /></a>
	 $details</p>
      <p>DatePosted: $Posted </p> 
	  <p>Seller: $seller </p>

	 	<a  href='Books.php' class='button'>Cancel</a>
		  <div class='row'>
<p> Order Confirmed in <span id='countdowntimer'> 5 </span> Seconds</p>

<script type='text/javascript'>
    var timeleft = 5;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById('countdowntimer').textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script>
	
	  </div>
</div>


</div>
";

		
}
?>
</form>	
</div>

		









</html>