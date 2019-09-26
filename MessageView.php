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
$result = $mysqli->query("SELECT messages.title, messages.message, messages.date_received, users.email from messages join users on messages.from_user=users.id where messages.to_user='$name[0]' ");
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

			
			<a id="headerImage" href ="welcome.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" 	class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
		</ul>
	</div>
		
</header>
</h1>
<body>
<div  class="container">
		</div>

<div  class="container">

	<div id="updateInfo" class="row ">
	<a   class="button" href="UserDetails.php">Profile Details</a>
	<a   class="button" href="orderHistory.php">Buy History</a>
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
		

</header>
<div class="row ">

</div>
</h1>
<div  class="container">



	
<h4 id='clothing' >Messages</h4> <p id="textProfile"></p>

	<a  class='button' href='Messaging.php'>Create Message</a>
<div class="row ">
<?php


	while($row=$result ->fetch_assoc()){
	
			$email = $row['email'];
			$title = $row['title'];
			$message = $row['message'];
			$date=$row['date_received'];

		
 echo"
</br>

	<div class='rows '>
		<h5 id='messagingrow' ><b>Title:</b> $title</h5>
	</div>
	<div class='rows '>
     <b>Message:</b> $message
	 </div></br>
	<div class='rows '>
	  	 <b>Sender:</b> $email  <b>Date Received:</b>  $date
	</div>
   
";

	}

?>

</div>
</div>
</html>
