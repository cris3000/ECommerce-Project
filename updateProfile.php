
 <?php
session_start();
$SessUser=[$_SESSION['40242807_id']];
if (!isset($_SESSION['40242807_id']))
   {
      header("location: Login.php");
	  
   }


$out= "";
$message ="";
$recmsg="";
$userMsg="";

$host= "xxxxxxxxeecs.qub.ac.uk";
	$pw= "1ZRxxxScm6G8nR570xj";
	$db="xxxx";
	$user="x";


$mysqli = new mysqli($host,$user,$pw,$db);


	if (isset($_POST['RegistrationForm'])){
		
	
	
			
			$email = $mysqli->real_escape_string($_POST['email']);
			$name = $mysqli->real_escape_string($_POST['name']);
			$address = $mysqli->real_escape_string($_POST['address']);
			$phone = $mysqli->real_escape_string($_POST['phone']);
			$facebook = $mysqli->real_escape_string($_POST['facebook']);
			$twtter = $mysqli->real_escape_string($_POST['twtter']);
			$linkedin = $mysqli->real_escape_string($_POST['linkedin']);
			$institution = $mysqli->real_escape_string($_POST['institution']);
			$Password =md5($_POST['Password']);
			$avatar= $mysqli->real_escape_string($_POST['avatar']);
			$result = $mysqli->query("SELECT * FROM users where id='$SessUser[0]'");
					
			$sql_reg="Update users SET email = '$email', name= '$name', address='$address', phone='$phone',
			facebook='$facebook',twtter='$twtter',linkedin='$linkedin', institution='$institution', avatar='$avatar',
			Password='$Password'  where id='$SessUser[0]'";
			
			if(mysqli_num_rows($result) ==1 && $mysqli->query($sql_reg) === true){
			$recmsg= "<h2>Records inserted successfully.</h2>";
				header( "refresh:5;url=index.php" );
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
				
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="welcome.php">Home</a>
					<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" 	class="button" href="account.php">Account</a>
	
	</ul>
	</div>
		
</header>
</h1>

	<div  class="container">
	
	<h4 </h4>
	<div id="updateInfo" class="row ">
	<a   class="button" href="UserDetails.php">Profile Details</a>
	<a   class="button" href="orderHistory.php">Buy History</a>
	<a  class="button" href="MessageView.php">View Messages</a>
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
	<div  class="container">

<form id="UpdateTable" action="updateProfile.php" method="POST" autocomplete="on">
	<h4 id="signup">Update Information-Fill All Fields</h4>

	
	 <label>Avatar: </label><input type="file" name="avatar" />
	<label for="email"><b>Email</b></label>
    <input id="regform"  type="text" name="email" >
	<label for="name"><b>Name</b></label>
    <input id="regform" type="text" name="name" >
	
	<label for="address"><b>Address</b></label>
    <input id="regform" type="text" name="address" >
	
	<label for="phone"><b>Phone</b></label>
    <input id="regform"  type="text"  name="phone" >
	
	<label for="facebook"><b>facebook</b></label>
    <input id="regform"  type="text"  name="facebook" >
	
	<label for="twtter"><b>Twitter</b></label>
    <input id="regform"  type="text"  name="twtter" >
	
	<label for="linkedin"><b>LinkedIn</b></label>
    <input id="regform"  type="text"  name="linkedin" >


	<label for="institution"><b>Educational Institution</b></label>
    <input id="regform"  type="text"  name="institution" >


    <label for="psw"><b>Password</b></label>
    <input  id="regform"  type="password" name="Password" >

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input  id="regform"  type="password" name="passrepeat" >
	<button id="submit" type="submit" name="RegistrationForm" 	class="signupbtn">Update</button>
   




	</div>
	</form>
	
	
	</html>
