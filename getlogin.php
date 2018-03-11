<?php
//session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Login Confirmation";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";

session_start(); 
include("db.php");
//include head layout
include ("headfile.html");

echo "<p></p>";
echo "<h2>".$pagename."</h2>";


$email=$_POST['email'];
$password=$_POST['password'];



if(empty ($email || $password)){
	echo "Please fill all the fields </br>";
	echo "Go Back to <a href=login.php> Login </a>";
}else {
	$sql = "SELECT * FROM users WHERE userEmail='$email' AND userPassword='$password'";
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);
	
	if (($rows == 1)) {
		
	    @$userArray = mysqli_fetch_array($result);
		@$userid = $userArray['userId'];
		@$fname = $userArray['userFName'];
		@$lname = $userArray['userSName'];
		@$type = $userArray['userType'];
	/* $_SESSION['login_user']=$email; // Initializing Session
	$_SESSION['login_user']=$password; */
	 if(strcmp($userArray['userEmail'],$email)<>0){
            
            echo "Sorry, the email you entered was not recognized.<br>";
            echo  "Go back to<a href=login.php > Login</a>";
    }else{
            if(strcmp($userArray['userPassword'],$password)<>0){
                
            echo "Sorry, the Password you entered is not valid.<br>";
            echo  "Go back to<a href=login.php > Login</a>";
                
            }else{
				
				// create a session variable for this customer who has just logged in
				$_SESSION['c_userid'] = $userid;
				$_SESSION['c_fname'] = $fname;
				$_SESSION['c_lname'] = $lname;
		
			//Display a greeting using the full name i.e. first name and surname stored in the session variable
				
				echo "<b>Hello, ".$_SESSION['c_fname']." ".$_SESSION['c_lname']."</b></br>"; 
				//echo"The Email you entered is ".$userArray['userEmail']."</br>";
               // echo "The Password is a Secret </br>";

			if($type=="C"){	
			include ("detectlogin.php");
                echo "You have succesfully Logged to the system as a Customer</br>";
                echo "To continue shopping<a href=index.php > Product Index</a><br>";
                echo "To View your Basket <a href=basket.php> My Basket</a>";
                
			}else if($type=="A"){
				echo "You have succesfully Logged to the system as an Administrator</br>";
				echo "<br><br>Access the <a href='adminmenu.php'>Admin Menu</a>";
			}
            }
		}
    }else{
        echo "Invalid Email Address.<br>";
        echo  "Go back to<a href=login.php > Login</a>";
    }    
		
}

//include head layout
include("footlayout.html");
?>