<?php
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Add product confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("adminheadfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

$prodName = $_POST['prodName'];
$picName = $_POST['prodPicName'];
$desc = $_POST['prodDescrip'];
$price = $_POST['prodPrice'];
$initStock = $_POST['prodQuantity'];

//empty ($email || $password)
if(empty ($prodName)|| ($picName)|| ($price)|| ($initStock)){
	echo "* indicates mandatory fields. You must supply values for mandatory fields.";
}else{
	$SQL="INSERT INTO products (prodName,prodPicName,prodDescrip,prodPrice,prodQuantity) VALUES ('$prodName','$picName','$desc',$price,$initStock)";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL=mysqli_query($conn,$SQL) or $error=mysqli_error($conn);


if($error==0)  { 
	

		echo "<br><br>The product has been added successfully<br><br>";
		echo "<br>Product Name :".$prodName;
		echo "<br>Product Picture :".$picName;
		echo "<br>Product Description :".$desc;
		echo "<br>Product Price :".$price;
		echo "<br>Initial Quantity :".$initStock;


				

}
 else{
	echo "<br><br>There was a problem adding product";
	echo "<br>".mysqli_error($conn);
} 

}

//include head layout
include("footlayout.html");
?>
