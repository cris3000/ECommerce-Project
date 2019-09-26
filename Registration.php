 <?php
session_start();
$message ="";
$recmsg="";
$userMsg="";
$rec="";

	$host= "chealey01.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="chealey01";
	$user="chealey01";



$mysqli = new mysqli($host,$user,$pw,$db);

if($mysqli==false){	
  
   die("ERROR: Could not connect. " . $mysqli->connect_error);
}
	if (isset($_POST['RegistrationForm'])){
		
	
		if($_POST['Password'] == $_POST['passrepeat']){
				
			}
			
			$email = $mysqli->real_escape_string($_POST['email']);
			$name = $mysqli->real_escape_string($_POST['name']);
			$address = $mysqli->real_escape_string($_POST['address']);
			$phone = $mysqli->real_escape_string($_POST['phone']);
			$facebook = $mysqli->real_escape_string($_POST['facebook']);
			$twtter = $mysqli->real_escape_string($_POST['twtter']);
			$linkedin = $mysqli->real_escape_string($_POST['linkedin']);
			$institution = $mysqli->real_escape_string($_POST['institution']);
			$Password =md5($_POST['Password']);
			$passrepeat = md5($_POST['passrepeat']);
			$avatar = $mysqli->real_escape_string($_POST['avatar']);
			
			
		

	if(strlen($Password) < 8) {
			
		$rec= "Invalid, please exceed 8 character password";
	}else{	
			$sql_reg= "INSERT INTO users (id, email, name, address, phone,facebook,twtter,linkedin, institution, Password, avatar )
			VALUES (null,'$email', '$name', '$address', '$phone', '$facebook','$twtter','$linkedin','$institution', '$Password', '$avatar')";
			
			$result = $mysqli->query("SELECT * FROM users where email='$email'");
			
		
		if(mysqli_num_rows($result) ==0 && $mysqli->query($sql_reg) === true){
			$recmsg= "<h2>Records inserted successfully.</h2>";
				header( "refresh:5;url=index.php" );
			}	
			else{
					$userMsg = "<h4>Email account already exists</h4>";
				}
			
		
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

			<a id="headerImage" href ="index.php"> <img src="images/Header.JPG" /></a>
				<ul id="navlist" >
					<a  id="x" class="button" href="About.php">About</a>
					<a  id="x" 	class="button" href="index.php">Home</a>
					<a  id="x" 	class="button" href="Login.php">login</a>
	
	</ul>
	</div>
		
</header>
</h1>
<div  class="container">


<form id="registrationTable" action="Registration.php" method="POST" autocomplete="on">
	<?php echo "$rec";?>
	<?php
		if ($message != "")  {
			echo "<h3> $message</h3>";
		}else{
			echo $recmsg;
		}
		
		if ($userMsg!=""){
			echo "<h3> $userMsg</h3>";
		}else{
		}
	?>
	   <h4>Please Login after Registering</h4>
	 <label>Avatar: </label><input type="file" name="avatar" />
		<label for="email"><b>Email</b></label>
    <input id="regform"  type="email" name="email" required>
	<label for="name"><b>Name</b></label>
    <input id="regform" type="text" name="name" required>
	
	<label for="address"><b>Address</b></label>
    <input id="regform" type="text" name="address" required>
	
	<label for="phone"><b>Phone</b></label>
    <input id="regform"  type="text"  name="phone" required>
	
	<label for="facebook"><b>facebook</b></label>
    <input id="regform"  type="text"  name="facebook" >
	
	<label for="twtter"><b>Twitter</b></label>
    <input id="regform"  type="text"  name="twtter" >
	
	<label for="linkedin"><b>LinkedIn</b></label>
    <input id="regform"  type="text"  name="linkedin" >


	<label for="institution"><b>Educational Institution</b></label>
    <input id="regform"  type="text"  name="institution" required>


    <label for="psw"><b>Password</b></label>
    <input  id="regform"  type="password" name="Password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input  id="regform"  type="password" name="passrepeat" required>
	<button id="submit" type="submit" name="RegistrationForm" 	class="signupbtn">Register</button>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    By creating an account you agree to our <a href="ToS.html">Terms & Privacy</a>.




	</div>
	</form>
	
	
	</html>