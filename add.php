<?php
session_start();
$name=[$_SESSION['40242807_id']];
if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
	  
   }
$recmsg="";

	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";
$mysqli= new mysqli($host,$user,$pw,$db);
if (isset($_POST['addForm'])){
$title = $mysqli->real_escape_string($_POST['title']);
$price = $mysqli->real_escape_string($_POST['price']);
$details = $mysqli->real_escape_string($_POST['details']);

$category = $mysqli->real_escape_string($_POST['category']);
$img_path = $_FILES['imgpath']['name'];
$img_path_tmp= $_FILES['imgpath']['tmp_name'];

$insert = "INSERT INTO product (id, Userid, title, price, imgpath, details, category, visibility, Posted) VALUES 
	(null,'$name[0]','$title', '$price', '$img_path','$details', '$category', 'Public', NOW())";

		if($mysqli->query($insert) === true){
			$recmsg= "<h2>Records inserted successfully.</h2>";
				header( "refresh:1;url=account.php" );
			}	else{
				
				die("ERROR: Could not connect. " . $mysqli->connect_error);
			}
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
					<a  id="x" class="button" href="welcome.php">Home</a>
					<a  id="x" 	class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
			
	
	</ul>
	</div>
	
	
		
</header>
</h1>
<div  class="container">

<div  class="container">
</br></br></br>
	<div id="updateInfo" class="row ">
	<a   class="button" href="UserDetails.php">Profile Details</a>
	<a   class="button" href="orderHistory.php">Buy History</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a  class="button" href="billing_details.php">Billing Details</a>

	</div>
	</div>

  <div class="row">

 

	</div>
		
			
		  <div class="row">
<h4 id='clothing' >Add Item to Sell</h4>
   

												
												

<form action="add.php" method="POST" enctype="multipart/form-data">
    <label>File: </label><input type="file" name="imgpath" />

  Title: <input type="text" name="title">
 Price £: <input type="number" name="price">
  Category : <select name="category">
  <option value="Electronics">Electronics</option>
  <option value="Clothing">Clothing</option>
  <option value="Books">Books</option>
</select>
<br>
<textarea rows="4" cols="50" name="details">
Description...</textarea>
  <input name='addForm' type="submit">
</form>									
									
					
</div>
</div>

</body>
