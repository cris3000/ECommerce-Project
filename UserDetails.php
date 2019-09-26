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
$result = $mysqli->query("SELECT * FROM `users` where id=$name[0]");

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
<header >

	<div class="container-fluid">

			
			<a id="headerImage" href ="welcome.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
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
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a  class="button" href="updateProfile.php">Update Profile</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
	
</header>
<div class="row ">

</div>
</h1>
<div  class="container">



	
<h4 id='clothing' >Profile Details</h4> <p id="textProfile">Click Update Profile to change any information</p>



<?php


	while($row=$result->fetch_assoc()){
	
		
		$email = $row['email'];
			$name = $row['name'];
			$address = $row['address'];
			$phone = $row['phone'];
			$facebook = $row['facebook'];
			$twtter = $row['twtter'];
			$linkedin = $row['linkedin'];
			$institution = $row['institution'];
			$avatar= $row['avatar'];
			
	
 echo"

<table id='userTable'>

  <thead>
   <img  src=avatar/$avatar id='avatar'  width='20%' />
    <tr>
      <th>Email</th>
	  <td>$email</td>
	  </tr>	
	   <tr>
      <th>name</th>
	   <td>$name</td>
	   </tr>
	    <tr>
      <th>address</th>
	   <td>$address</td>
	   </tr>
	    <tr>
	  <th>phone</th>
	   <td>$phone</td>
	   </tr>
	    <tr>
	    <th>facebook</th>
	   <td>$facebook</td>
	   <tr>
	    <tr>
	    <th>twtter</th>
	   <td>$twtter</td>
	   </tr>
	    <tr>
	   <th>linkedin</th>
	   <td >$linkedin</td>
	   </tr>
	    <tr>
	   <th>Academic institution</th>
	   <td>$institution</td>
	   
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