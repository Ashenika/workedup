<?php
//session_start();
//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";

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
//display name of the page and some random text
echo "<h2> Register and Create a Delicious AshCake Account </h2>";
//$prodid= $_GET['u_userid'];
//$fName = $lName = $address = $pCode = $tNo = $email = $pass = $cpassword =" ";

//value=" .$fName ."  value=" . $lName. " value=" . $address. " value=" . $pCode. " value=" . $tNo ."  value=" . $email ." value=" . $pass ." value=" . $cpassword ."

echo"<form action='getregister.php'  method='POST'  >";
echo "<table>";
  echo "<tr>";
   echo " <td>First Name: </td>";
   echo " <td> <input type='text' name='firstname' > </td>";
  echo "</tr>";

  echo "<tr>";
   echo " <td>Last Name: </td>";
   echo " <td> <input type='text' name='lastname' > </td>";
  echo "</tr>";

echo "<tr>";
   echo " <td>Address</td>";
   echo " <td> <input type='text' name='address' > </td>";
echo "</tr>";

echo "<tr>";
   echo " <td>Post Code:</td>";
echo " <td> <input type='text' name='pcode' > </td>";
echo "</tr>";

echo "<tr>";
   echo " <td>Tel No:</td>";
echo " <td> <input type='text' name='telno' > </td>";
echo "</tr>";

echo "<tr>";
   echo " <td>Email Address:</td>";
echo " <td> <input type='text' name='email'> </td>";
echo "</tr>";

echo "<tr>";
   echo " <td>Password:</td>";
echo " <td> <input type='password' name='password' > </td>";
echo "</tr>";

echo "<tr>";
   echo "<td>Confirm Password:</td>";
echo " <td> <input type='password' name='cpassword' > </td>";
echo "</tr>";

echo "<tr>";
   echo " <td><input type='submit' value='Register'></td>";
echo " <td> <input type='reset' value='Clear Form'></td>";
//echo "<input type=hidden name=h_userid value=".$userId.">";
echo "</tr>";
echo "</table>";
echo "</form>";



//include head layout
include("footlayout.html");
?>