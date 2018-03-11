<?php
include("db.php");
session_start(); 
//create a variable called $pagename which contains the actual name of the page
$pagename="Product Information";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
include ("detectlogin.php");
echo "<p></p>";
//include ("slideshow.html");
echo "<h2>".$pagename."</h2>";

//retrieve the product id passed from the previous page using the $_GET superglobal variable
//store the value in a variable called $prodid
$prodid= $_GET['u_prodid'];
//echo "<p>Selected product Id: ".$prodid;

//query the product table to retrieve the record for which the value of the product id 
//matches the product id of the product that was selected by the user
$prodSQL="SELECT prodId, prodName, prodPicName, 
prodDescrip , prodPrice, prodQuantity FROM products
where prodId=".$prodid;
$result = $conn->query($prodSQL);

//execute SQL query
$exeprodSQL=mysqli_query($conn,$prodSQL) or die(mysqli_error($conn));
//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysqli_fetch_array($exeprodSQL);

//display product name in capital letters
echo "<p><b>".strtoupper($thearrayprod['prodName'])."</b>";
echo "<br>";
echo "<img src=images/".$thearrayprod['prodPicName'].">";
echo "<br>";
echo $thearrayprod['prodDescrip'];
echo "<br>";
echo "LKR ". $thearrayprod ['prodPrice'];
echo "<br>";
echo "Number in Stock".$thearrayprod ['prodQuantity'];
echo "<br>";
echo "<p></p>";

//display form made of one text box and one button for user to enter quantity
//pass the product id to the next page basket.php as a hidden value

echo "<form action=basket.php method=POST>";
echo "<p>Select Required Quantity: ";
echo "<select name=p_quantity  >";
	for($i=1; $i<=$thearrayprod['prodQuantity']; $i++){
					echo '<option value="'.$i.'">'.$i.'</option>';
	}
echo "</select>";

//echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<input type=submit value='Add to Basket' name='btnAdd'>";
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</center>";
echo "</form>";


//include head layout
include("footlayout.html");
?>