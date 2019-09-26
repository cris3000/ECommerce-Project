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
$result = $mysqli->query("SELECT * FROM billing where UserID=$name[0]");

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
	<a   class="button" href="orderHistory.php">Order History</a>
	<a  class="button" href="UserDetails.php">Profile Details</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
	
</header>
<div class="row ">

</div>
</h1>
<div  class="container">



	
<h4 id='clothing' >Billing Details</h4> <p id="textProfile">Click Update Billing Details to change any information</p>

	<a  class='button' href='billing.php'>Update Billing Details</a>

<?php


	while($row=$result->fetch_assoc()){
	
		
			$Fullname = $row['Name'];
			$Email = $row['Email'];
			$Address = $row['Address'];
			$City = $row['City'];
			$PostCode = $row['PostCode'];
			$CardNumber = $row['CardNumber'];
			$ExpiryDate = $row['ExpiryDate'];
			
			$CardNumber_LastFour = substr ($CardNumber, -4);
			
 echo"

<table id='userTable'>

  <thead>

    <tr>
      <th>Name on Card</th>
	  <td>$Fullname</td>
	  </tr>	
	   <tr>
      <th>Billing Address</th>
	   <td>$Address</td>
	   </tr>
	    <tr>
	  <th>City</th>
	   <td>$City</td>
	   </tr>
	    <tr>
	    <th>Post Code</th>
	   <td>$PostCode</td>
	   <tr>
	    <tr>
	    <th>Card Number</th>
	   <td>**** **** **** $CardNumber_LastFour</td>
	   </tr>
	    <tr>
	   <th>Expiry Date</th>
	   <td >$ExpiryDate</td>
	   </tr>

	   
    </tr>
	 </thead>
	   <tbody>

    <tr>
    
    </tr>
 </tbody>
";

	}

?>

</table>
</div>
</html>