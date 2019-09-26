<?php
session_start();

$name=[$_SESSION['40242807_id']];
if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
	  
   }
	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
	

$mysqli = new mysqli($host,$user,$pw,$db);
$result = $mysqli->query("SELECT * FROM product WHERE visibility='Public'");

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
<style>
	body{
		margin:0;
		padding:0;
	}
	#box2{
	height:100vh;
	width:100%;
	background-image: url(https://webfoundation.org/docs/2017/03/March-12-Letter.jpg);
	background-size:cover;
	
	}
	#box1{
	height:100vh;
	width:100%;
	background-image: url(https://myzol.co.zw/Data/Articles/2320/online__zoom.jpg );
	background-size:cover;
	
	}
	#box3{
	height:100vh;
	width:100%;
	background-image: url( https://cdn.rswebsols.com/wp-content/uploads/2015/12/shopping-cart.jpg);
	background-size:cover;
	
	}
	
</style>

<head>
<title> ElmTree</title>
</head><header>
	<div class="container-fluid">
		<div class="row ">
			
<a id="headerImage" href = "welcome.php"> <img src="images/Header.JPG" /></a>
   <form action="search.php" method="GET">
	<div id="newbar" class="12 columns sm">
	<input type="text" name='search' placeholder="Enter Search">
		<input type="submit"  name="form_submit"  value="Search">
		
		</form>
</div>	
<div class="container-fluid">
				<ul id="navlist" >
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
	</ul>
	</div></div>
		</div>
			
</header>
</h1>


<div class="column ten xs">
	<div id="WelcomeROW" class="row">
	
	<ul id="list">
		<a class="button" id="Categories" href="Clothing.php">Clothing</a>
		<a class="button"id="Categories" href="Books.php">Books</a>
		<a class="button"id="Categories" href="Electronics.php">Electronics</a>
		</ul>
	</div>
</div>
<div class="container-fluid">
	<div id='box1'>

	<h5 id="title"> About us</h5>
	
	<div class="row">
	<div class="twelve column">
	</div> 
 ElmTree was formed in early 2019 by Queen's University students to provide a marketplace for locals to buy, and sell goods. 
	Our platform allows for users to sell a wide range of goods, commission free.
	 </div>  
	</div>

</div>

<h5  id="title"> Our Mission</h5> 
	 Our mission is to provide a platform for students to earn an income, and allow customers to purchase high-quality goods for low prices.
			Our vision is to be earth's most customer-centric company; 
	to build a place where people can come to find and discover anything they might want to buy online<div id='box2'>

	
	</div>

 
	</div>
	<h5  id="title"> Our Goods</h5> 
As we are a student based E-Commerce store, we cater to goods that are particularly useful to students.
	The categories we allow are, Electronics, Books, and Clothing
	We expect all items posted to be of considerable quality. If you would not purchase it
	due to it quality, then neither will others.
	<div id='box3'>
	</div>










</html>