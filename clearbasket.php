<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";
session_start();
include("db.php");
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";


//display window title
echo "<title>".$pagename."</title>";

//include head layout
include ("headfile.html");
include ("detectlogin.php");
echo "<p></p>";
echo "<h2>".$pagename."</h2>";

unset($_SESSION['basket']);
echo "Your Basket is cleared";

//include head layout
include("footlayout.html");
?>