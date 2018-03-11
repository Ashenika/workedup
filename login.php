<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Login";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
session_start(); 
include("db.php");
//include head layout
include ("headfile.html");
include ("detectlogin.php");
echo "<p></p>";
echo "<h2>".$pagename."</h2>";



echo"<form action='getlogin.php'  method='POST'  >";
echo "<table>";
echo "<tr>";
   echo " <td>Email Address:</td>";
echo " <td> <input type='text' name='email'> </td>";
echo "</tr>";

echo "<tr>";
   echo " <td>Password:</td>";
echo " <td> <input type='password' name='password' > </td>";
echo "</tr>";

echo "<tr>";
   echo " <td><input type='submit' value='Login'></td>";
echo " <td> <input type='reset' value='Clear Form'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

//include head layout
include("footlayout.html");
?>