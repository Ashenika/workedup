<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Home";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");
include ("slideshow.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
echo "<br><br><b>Welcome to AshCakes!!!</b>";
	echo "<br><br>";
	echo "Administrators :";
	echo "<a href='login.php'> Admin Login</a>";
	echo "<br><br>";
	echo "AshCake friends :";
	echo "<a href='index.php'> Go to index page</a>";

//include head layout
include("footlayout.html");
?>
