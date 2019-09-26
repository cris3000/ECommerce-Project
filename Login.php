<?php
session_start();


	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";


$mysqli = new mysqli($host,$user,$pw,$db);

	$message="";


if($mysqli==false){
  

	
   die("ERROR: Could not connect. " . $mysqli->connect_error);
}


if (isset($_POST['loginForm'])){
	$email =$_POST['email'];
	$Password =$_POST['LoginPass'];
	$Password =md5($Password);

	
	$email = $mysqli->real_escape_string($email);
	$Password = $mysqli->real_escape_string($Password);

	
	$sql = "SELECT email, Password, id FROM users where email='$email' AND Password='$Password' LIMIT 1";
   $result3 = mysqli_query($mysqli,$sql);
   


   
	
//	$results = mysqli_num_rows($sql);
	
	//if($result3==1){
		  //  $row = mysqli_fetch_assoc($results);
		   $row = mysqli_fetch_assoc($result3);
			$myuser= $row['email'];
			$myid= $row['id'];
			 $_SESSION['40242807_user']= $myuser; 
			$_SESSION['40242807_id']=$myid;
			echo  $_SESSION['40242807_user'];
	
		
		
	header( "refresh:1;url=account.php" );
		
	
	}else{
	 $message= "Wrong Username or password";


	
}
	
?>


<!DOCTYPE>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
<link rel="stylesheet" href="styles.css">


<meta name="viewport" content="width=device-width, initial-scale=1">



<title> ElmTree</title>
</head>

<header>

<div class="column ten xs">
		<div class="row">
			<a id="headerImage" href ="index.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a id="x" href="account.php"  class="button">Account </a>
					<a  id="x" class="button" href="About.php">About</a>
					
					<a  id="x" 	class="button" href="Registration.php">Register</a>
					
					<a  id="x" 	class="button" href="index.php">Home</a>
	
	</ul>
	</div>
		</div>
			</div>
				</div>

</header>
</h1>
<div  class="container">
<?php

if(isset($_SESSION['40242807'])){
	echo "Hello : {$_SESSION['40242807']}";
}else{
	
	?>
	
	
<form id="registrationTable" action="Login.php" method="POST" autocomplete="on">
	<h4 id="signup">Login</h4>
	<?php echo "$message" ; ?>
	<label for="Username"><b>Email</b></label>
    <input id="regform" type="text" name="email" required>
	
	<label for="Password"><b>Password</b></label>
    <input id="regform" type="password" name="LoginPass" required>
	
	
	
	<button id="submit" type="submit" name="loginForm" class="signupbtn">Login</button>
	</div>
	</form>
	
	<a id="linkForgotPass" href="Registration.php">Register</a>
<?php
}

?>

</html>