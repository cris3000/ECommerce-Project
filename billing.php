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
if (isset($_POST['BillingForm'])){
$FullName = $mysqli->real_escape_string($_POST['Fullname']);
$Email = $mysqli->real_escape_string($_POST['Email']);
$Address = $mysqli->real_escape_string($_POST['Address']);
$City = $mysqli->real_escape_string($_POST['City']);
$Postcode = $mysqli->real_escape_string($_POST['PostCode']);
$CardNumber = $mysqli->real_escape_string($_POST['CardNumber']);
$ExpiryDate = $mysqli->real_escape_string($_POST['ExpiryDate']);
$CVV = $mysqli->real_escape_string($_POST['CVV']);

	$result = $mysqli->query("SELECT * FROM billing where UserID='$name[0]'");
if(mysqli_num_rows($result) ==1){
	$Update= "Update billing SET Name='$FullName', Email='$Email', Address='$Address', City='$City', PostCode='$Postcode', CardNumber='$CardNumber',
	ExpiryDate='$ExpiryDate', CVV='$CVV'  WHERE UserID='$name[0]'";
	
			// Would not work when i used one IF statement with $UPDATE || $insert. So it became this mess. 
			if($mysqli->query($Update) === true){
			$recmsg= "<h2>Records inserted successfully.</h2>";
				header( "refresh:1;url=billing_details.php");
			}	else{
				echo "Connect Error, Update Failed".$mysqli->connect_error;
			
			}	
}else{
		
		$insert = "INSERT INTO billing (id,Name, Email, Address, City, PostCode, CardNumber, ExpiryDate, CVV, UserID) VALUES 
		(null,'$FullName','$Email', '$Address', '$City','$Postcode', '$CardNumber', '$ExpiryDate', '$CVV', '$name[0]')";
	

	
			if($mysqli->query($insert) === true){
			$recmsg= "<h2>Records inserted successfully.</h2>";
				header( "refresh:1;url=billing_details.php");
			}	else{
				echo "Connect Error, Insert Failed".$mysqli->connect_error;
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
</head><header>

	<div class="column ten xs">
		<div class="row">
			<a id="headerImage" href = "welcome.php"> <img src="images/Header.JPG" /></a>

				<ul id="navlist" >
					<a id="x" href="account.php"  class="button">Account </a>
					<a  id="x" class="button" href="About.php">About</a>
							<a  id="x" 	class="button" href="LogOut.php">LogOut</a>
					<a  id="x" class="button" href="welcome.php">Home</a>
			
	
	</ul>
	</div>
	
		</div>
			</div>
			<div  class="container">

	<div id="updateInfo" class="row ">
	<a   class="button" href="orderHistory.php">Order History</a>
	<a  class="button" href="UserDetails.php">Profile Details</a>	
	<a  class="button" href="billing_details.php">Billing Details</a>
	<a  class="button" href="add.php">Add Items</a>
	</div>
	</div>
	
				</div>
</header>
</h1>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form  id="billing" action="billing.php" method='POST'>

        <div class="row">
         
            <h4>Billing Address</h4>
            <label for="fname">Full Name</label>
            <input  id="billing" type="text" id="fname" required name="Fullname">
            <label for="email"> Email</label>
            <input id="billing" type="text" id="email" required name="Email" >
            <label for="address"> Address</label>
            <input  id="billing" type="text" id="adr" required name="Address" >
            <label for="city"> City</label>
            <input id="billing" type="text" id="city" required name="City">
			<label for="city">	Post Code</label>
            <input  id="billing"type="text" maxlength="7" id="PostCode" name="PostCode">

            <div class="row">
              <div class=">
     
              </div>
             
            </div>
          </div>

          <div class="">
            <h5>Payment</h5>
            <label for="AcceptedCards">Accepted Cards</label>
            <div class="icon-container">
              <i id="visa" class="fa fa-cc-visa"></i>
              <i  id="amex"class="fa fa-cc-amex" ></i>
              <i id="mastercard" class="fa fa-cc-mastercard"></i>
              <i id="discover" class="fa fa-cc-discover"></i>
            </div>
        
            <label for="ccnum"> Card number</label>
            <input type="tel" pattern='.{7,17}' id="billing" required name="CardNumber" >
     

            <div class="row">
              <div>
                <label for="expyear">Expiry Date</label>
                <input id="ExpBox" name="ExpiryDate" required type="date">
              </div>
              <div>
                <label for="cvv">CVV</label>
                <input id="billing" maxlength="3" type="text" id="cvv" required name="CVV" >
					<button id="submit" type="submit" name="BillingForm" 	class="signupbtn">Update</button>
              </div>
            </div>
          </div>

        </div>
      
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
   
        </span>
      </h4>
  
    </div>
  </div>
</div>