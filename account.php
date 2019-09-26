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


$conn= new mysqli($host,$user,$pw,$db);
$result=$conn->query("SELECT * FROM product where userID=$name[0]");


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
					<a  id="x" 	class="button" href="welcome.php">Home</a>
	
	</ul>
	<div id="updateInfo" class="row ">
	 <form action="search.php" method="GET">
	<div id="newbar" class="11 columns sm">
	
		<input id="newbar"type="text" name='search' placeholder="Search">
		<input id="newbar"type="submit" name="form_submit"  value="search">
		</form>
			</div>
	</div>
		
</header>

</h1>
<body>
<div  class="container">

	<div id="updateInfo" class="row ">
	<a   class="button" href="UserDetails.php">Profile Details</a>
	<a   class="button" href="orderHistory.php">Buy History</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>

<div  class="container">
	<div  class="columns">
	
		<h4 id="accountSubHeader" >Account<p>Your items currently for Sale</p></h4> 
		
</div>
</div>
 <div class="container">
<form action="account.php" method="POST" enctype="multipart/form-data">
<?php
$recmsg="";
while($row=$result->fetch_assoc()){
		$id=$row['id'];
		$title=$row['title'];
		$detail=$row['details'];
		$price=$row['price'];
		$imgpath=$row['imgpath'];
	
echo "
<div  class='container'>
   <div id='titleAcc' class='col s10 m10'><h5>$title</h5></div>
	    <div id='price'class='col s5'>£$price</div>
	
		
			  <span class='tooltiptext'>$detail</span>
		<a  class='twelve columns'><img src=images/$imgpath width='20%'/></a>
	<h6 id='detailsAccountProduct' ><b>Viewablility</b></h6>
	<select name='visibility'>
  <option value='Public'>Public</option>
  <option value='Private'>Private</option>
</select>
<button id='submit' type='submit' name='accountForm' 	class='button'>Update</button>
	<a id='deleteButton' class='button' href='deleteProduct.php?id=$row[id]'>Delete</a>
</div>
 ";
	};
	
	if (isset($_POST['accountForm'])){
$visibility = $conn->real_escape_string($_POST['visibility']);

$insert = "Update  product SET visibility = '$visibility' where id='$id'";

		if($conn->query($insert) === true){
				
			}	
}
?>
</body>


</form>
 </div>
 </div>
	</html>
