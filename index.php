<?php
//include a db.php file to connect to database
include ("db.php");
session_start(); 

//create a variable called $pagename which contains the actual name of the page
$pagename="Index";

//call in the style sheet called stylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";

//include head layout
include ("headfile.html");
include ("detectlogin.php");
include ("slideshow.html");

echo "<p></p>";
//display name of the page and some text
echo "<h2>".$pagename."</h2>";
echo "<p> The Most Delicious Cakes for you! <br><br><hr>";

//create a new variable containing a SQL statement retrieving names of products from the product table
$SQL="SELECT prodId, prodName, prodPicName, prodPrice FROM products";
$result = $conn->query($SQL);


//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysqli_query($conn,$SQL) or die (mysqli_error($conn));



//create an array of records (2 dimensional variable) called $prodArray.
//populate it with the records retrieved by the SQL query previously executed.
//loop through the array i.e while the end of the array has not been reached go through it
while ($arrayprod=mysqli_fetch_array($exeSQL))
{
//echo $arrayprod ['prodName'];
//echo "<br>";
//make each product a link to the next page and pass the product id to the next page by URL
//concatenate a string of characters u_prodid which carries the value of the actual id
echo "<p title = prodinfo.php?u_prodid=".$arrayprod['prodId'] .">" ."<a href=prodinfo.php?u_prodid=".$arrayprod['prodId'].">";
//Display name of the product
echo $arrayprod['prodName']."<br>";
echo "</a>";

echo "<img src=images/".$arrayprod['prodPicName'].">";
echo "<br>";
echo "LKR ". $arrayprod ['prodPrice'];
echo "<br>";
echo "<hr>";
}
//include head layout
include ("footlayout.html");
//$conn->close();
?>