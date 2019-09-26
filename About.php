<?php

session_start();

	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
	

$mysqli = new mysqli($host,$user,$pw,$db);


if($mysqli->connect_errno){
	echo "Connect Error".$mysqli->connect_error;
}
		
	if (isset($_POST['aboutSubmit'])){
	
		$name = $mysqli->real_escape_string($_POST['name']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$message = $mysqli->real_escape_string($_POST['message']);
		
		
		

	

$sql_reg= "INSERT INTO about (name, email, message)
			VALUES ('$name', '$email', '$message')";
			
		if($mysqli->query($sql_reg) === true){
				header( "refresh:5;url=index.php" );
			}	else{
				
				die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			
	
	
}
		
?>

<!DOCTYPE>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
<link rel="stylesheet" href="styles.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<title> ElmTree</title>
</head>

<header>

<div class="column ten xs">
		<div class="row">
			<a id="headerImage" href ="welcome.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
					<a  id="x" 	class="button" href="Registration.php">Register</a>
					<a  id="x" 	class="button" href="Login.php">login</a>
	
	</ul>
	</div>
		</div>
			</div>
				</div>
</header>
<div class="container m6	">



  <!-- columns should be the immediate child of a .row -->
  <div class="row">
    <div class="one column"></div>
    <div id="title"class="seven columns"></h5>  <a href="#contact">Contact Page</a>
	</div>
	<div id="title"class="five columns">
 	<h5 > About us</h5>

	 </div>  
	</div>
	
	<div class="row">
	<div class="five column">
	ElmTree was formed in early 2019 by Queen's University students to provide a marketplace for locals to buy, and sell goods. 
	Our platform allows for users to sell a wide range of goods, commission free.
	
	
	

	</div>

	</div>
 </div>
 
		 
<div class="parallax"></div>
	<div class="container m6	">
	<div class="row">
	<div class="five column">
	<h5  id="title"> Our Mission</h5> 
	Our mission is to provide a platform for people to earn an income, and allow customers to purchase high-quality goods for low prices.
	
	</div>

	</div>
 </div>
 
 <div class="parallax"></div>
 <div  class="container m6	">
	<div class="row">
	<div class="five column">
		<h5 id="title"> Contact us</h5> 
		
	
<div  id="contact"class="container">
  <form id="contact" name='aboutSubmit'method="POST" action="About.php">

    <label for="fname">Full Name</label>
    <input id="contactForm" type="text" id="fname" name="name" required>

 
    <label for="fname">Email Address</label>
    <input id="contactForm" type="email" id="Email" name="email" required>
	
	
	
    <label for="subject">Subject</label>
    <textarea id="contactForm" name="message" placeholder="Write something.." style="height:200px" required></textarea>

   
	<button id="contactSubmit" type="submit" name="aboutSubmit" 	class="signupbtn">Submit</button>
  </form>
</div>
  <!-- columns should be the immediate child of a .row -->
  <div class="row">
    <div class="four column"></div>
    <div class="eight columns">
	
			</div>
		
	</div>
		</div>
	</div>
  </html>