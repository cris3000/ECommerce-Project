 <?php

$message ="";
$recmsg="";
$userMsg="";

session_start();
	$host= "xxxxxx.lampt.eeecs.qub.ac.uk";
	$pw= "1ZRScm6G8nR570xj";
	$db="xxxxx01";
	$user="xxxxx01";



$mysqli = new mysqli($host,$user,$pw,$db);

if($mysqli==false){
  
   die("ERROR: Could not connect. " . $mysqli->connect_error);
}
	if (isset($_POST['RegistrationForm'])){
		
	
		if($_POST['Password'] == $_POST['passrepeat']){
				
			}else{
				$message = "Passwords do not match";
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
			
			
			$sql_reg= "Update users Set ( email, name, address, phone,facebook,twtter,linkedin, institution, Password )
			VALUES ('$email', '$name', '$address', '$phone', '$facebook','$twtter','$linkedin','$institution', '$Password')";
			
			$result = $mysqli->query("SELECT * FROM users where email='$email'");
			
		if(mysqli_num_rows($result) ==1 && $mysqli->query($sql_reg) === true){
			$recmsg= "<h2>Records updated successfully.</h2>";
				header( "refresh:5;url=index.html" );
			}	
			else{
				echo "updated";
				}
	}	
	?>
