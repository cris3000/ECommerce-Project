 <?php

$host= "xxxxxxxxeecs.qub.ac.uk";
	$pw= "1ZRxxxScm6G8nR570xj";
	$db="xxxx";
	$user="x";


$_SESSION['email']= $email; 
	echo $_SESSION['email'];
$mysqli = new mysqli($host,$user,$pw,$db);

if($mysqli==false){
  
   die("ERROR: Could not connect. " . $mysqli->connect_error);
}
	if (isset($_POST['RegistrationForm'])){
		
		
		if($_POST['password'] == $_POST['passrepeat']){
			
			
			$username = $mysqli->real_escape_string($_POST['username']);
			$fName = $mysqli->real_escape_string($_POST['firstName']);
			$lastname = $mysqli->real_escape_string($_POST['lastname']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$password =md5($_POST['password']);
			$passrepeat = md5($_POST['passrepeat']);
			
		$sql_reg= "INSERT INTO registration (id, username, FName, LName, Email, Password)
			VALUES (null,'$username', '$fName', '$lastname', '$email', '$password')";
			



			if($mysqli->query($sql_reg) === true){
			echo "<h2>Records inserted successfully.</h2>";
			header( "refresh:5;url=index.html" );
			}
			else{
				echo $conn->error;
			}
		}	
		
	}		

?>
