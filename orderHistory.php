<?php
session_start();
$name=[$_SESSION['40242807_id']];
$totalprice="";
if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
	  
   }
	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
	

$mysqli = new mysqli($host,$user,$pw,$db);
$result = $mysqli->query("SELECT * FROM `OrderPurchase` where UserID=$name[0]");

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
	
	<div id="updateInfo" class="row ">
	<a   class="button" href="updateProfile.php">Update Profile</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a   class="button" href="orderHistory.php">Order History</a>
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
	
</header>
</h1>
<div  class="container">



<h4 id='clothing' >Order History</h4>


<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Details</th>
      <th>Price</th>
	  <th>Purchase Date</th>
    </tr>
	 </thead>
	   <tbody>
<?php

while($row=$result->fetch_assoc()){
	
		$id=$row['id'];
		$title=$row['title'];
		$price=$row['price'];
		$details=$row['details'];
		$date =$row['date'];
			$totalprice=$totalprice+$price;
	
 echo"


    <tr>
      <td>$title</td>
      <td>$details</td>
      <td>$price</td>
	  <td id='orderTable'>$date</td>
    </tr>
 </tbody>
 	
";

}

?>

</table>
<b> <?php echo "	 Total Amount Spent: £$totalprice";?></b>
</div>
</html>