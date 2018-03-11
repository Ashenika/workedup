<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
include ("detectlogin.php");
echo "<p></p>";
echo "<h2>".$pagename."</h2>";

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$pCode=$_POST['pcode'];
$telNo=$_POST['telno'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
//@$userId=$_POST['h_userid'];

//$_SESSION['login'] = $userId;
//$_SESSION['login'] = $firstname;
//$_SESSION['login'] = $lastname;

if(!empty ($firstname || $lastname || $address || $pCode || $telNo || $email || $password || $cpassword)){
	if(!($password == $cpassword)){
	//Display error passwords not matching message
	//Display a link back to register page	
	echo "The 2 passwords you entered do not match </br>";
	echo "Please make sure you enter them correctly </br>";
	echo "Go Back to <a href=register.php> Register </a>";
	}
	//(meaning that the user entered an email which already existed
// Get the value from the formWHERE prodId= '".$key."'";
		$sqle = "SELECT userEmail FROM users WHERE userEmail = '".$email."'";
		$rese = mysqli_query($conn,$sqle)or die(mysqli_error($conn));
		$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	 if(($rese && mysqli_num_rows($rese)>0) && (!preg_match($reg,$email))){
		//Display email already taken error message
		//Display a link back to register page
		echo "The email you entered is not valid";
		echo "Please make sure you enter it correctly </br>";
		echo "Go Back to <a href=register.php> Register </a>";
	} else{
	//Write SQL query to insert a new user into users table and execute SQL query
	//Execute INSERT INTO SQL query	
	//The SQL code for inserting a new record is 
	$userSQL="INSERT INTO users (userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) 
		  VALUES ('C','$firstname','$lastname','$address','$pCode','$telNo','$email','$password')";
	//execute SQL query
		$runSQL=mysqli_query($conn,$userSQL) or die(mysqli_error($conn));

	//Retrieve the error number using mysql_errno. If the error detector returns the number 0, everything is fine
	if(!mysqli_errno($conn)){
		//Display registration confirmation message
		//Display a link to login page	
			echo "You have succesfully registered in the system </br>";
			echo "To continue Please <a href=login.php> Login</a>";
		
	}else {
		//if the error detector does not return the number 0, there is a problem
		//Display generic error message
		//if the error detector returned the number 1062 i.e. unique constraint on the email is breached 
		echo "Errorcode: %d\n", mysqli_errno($runSQL);
	}	
	
}
}else {
	echo "All fields are Compulsory </br>";
	echo "Go Back to <a href=register.php> Register </a>";
}


//include head layout
include("footlayout.html");
?>