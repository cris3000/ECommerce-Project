<?php
session_start();
$name=[$_SESSION['40242807_id']];
if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
   }
	$host= "xxxxxx.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="xxxxx01";
	$user="xxxxx01";
	

$mysqli = new mysqli($host,$user,$pw,$db);


if($mysqli->connect_errno){
	echo "Connect Error".$mysqli->connect_error;
}
		
	if (isset($_POST['MessageSubmit'])){
	
		$title = $mysqli->real_escape_string($_POST['title']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$message = $mysqli->real_escape_string($_POST['message']);

		$result = $mysqli->query ("SELECT id from users where email = '$email'");
	
		while($row=$result->fetch_assoc()){
			$to_user = $row['id'];
		
		
		$sql_reg= "INSERT INTO messages (id,title, email, message, from_user, to_user, date_received)
			VALUES (null,'$title', '$email', '$message', '$name[0]', $to_user, NOW())";
			
		if($mysqli->query($sql_reg) === true){
				header( "refresh:1;url=account.php" );
			}	else{
				
				die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
			
	
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
				
				<div  class="container">

	<div id="updateInfo" class="row ">
	<a   class="button" href="orderHistory.php">Order History</a>
	<a  class="button" href="UserDetails.php">Profile Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
</header>
<div class="container m6	">



  <!-- columns should be the immediate child of a .row -->
  <div class="row">
    <div class="one column"></div>
	</div>
	<div id="title"class="five columns">
 	<h5 > Send Message</h5>

	 </div>  
	

	</div>
 </div>
 
		 

	</div>
 </div>
 

 <div  class="container m6	">
	<div class="row">
	<div class="five column">
		
	
<div  id="contact"class="container">
<a  class="button" href="MessageView.php">View Messages</a>
  <form id="contact" name='MessageSubmit' method="POST" action="Messaging.php">

    <label for="fname">Title</label>
    <input id="contactForm" type="text" id="fname" name="title" required>

 
    <label for="fname">To Email Address</label>
    <input id="contactForm" type="email" id="Email" name="email" required>
	
	
	
    <label for="subject">Message</label>
    <textarea id="contactForm" name="message" placeholder="Write something.." style="height:200px" required></textarea>

   
	<button id="contactSubmit" type="submit" name="MessageSubmit" 	class="button">Submit</button>
  </form>
</div>
  <div class="row">
    <div class="four column"></div>
    <div class="eight columns">
	
			</div>
		
	</div>
		</div>
	</div>
  </html>
