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

@$newprodid = $_POST['h_prodid'];
@$reququantity = $_POST ['p_quantity'];

 if(isset($_POST['p_quantity'])){  //if session var already exist
	$_SESSION ['basket'] [$newprodid] = $reququantity;
 }
if (isset ($_SESSION['basket']) && !empty($_SESSION['basket'])){
	echo "your basket has been updated";

echo "<table>";
  echo "<tr>";
   echo " <th>Product Name</th>";
   echo " <th>Price</th>";
   echo " <th>Quantity</th>";
   echo " <th>Sub Total</th>";
  echo "</tr>";
	
 

 $total=0;
 //loop 
 foreach(($_SESSION['basket']) as $key => $value){
	 $prodSQL="SELECT prodId, prodName, prodPicName, 
		prodDescrip , prodPrice, prodQuantity FROM products
		WHERE prodId= '".$key."'";

	$result = $conn->query($prodSQL);
	$exeprodSQL=mysqli_query($conn,$prodSQL) or die(mysqli_error($conn));
	$thearrayprod=mysqli_fetch_array($exeprodSQL);
 

  
 echo  "<tr>";
  echo  "<td>".$thearrayprod['prodName'] ."</td>";
  echo  "<td>".$thearrayprod['prodPrice']. "</td>";
  echo "<td>".$value."</td>";
  $subtotal=$value*$thearrayprod['prodPrice'];
  echo " <td> LKR".$subtotal."</td>";
 echo "</tr>";
  $total += $subtotal; 

 }

   echo  "<tr>";
  echo  "<td colspan=3 >Total</td>";
  echo "<td> LKR".$total."</td>";
 echo "</tr>";
echo "</table>";

}else {
	$total=0;
	 echo "Existing Basket";
	 echo "<table>";
  echo "<tr>";
   echo " <th>Product Name</th>";
   echo " <th>Price</th>";
   echo " <th>Quantity</th>";
   echo " <th>Sub Total</th>";
  echo "</tr>";
   echo  "<tr>";
  echo  "<td colspan=3 >Total</td>";
  echo "<td> LKR".$total."</td>";
 echo "</tr>";
echo "</table>";
 }
echo "</br>";
echo "<a href=clearbasket.php> Clear the Basket </a>";
echo "</br>";
echo "</br>";
if (isset ($_SESSION['c_userid']) && !empty($_SESSION['c_userid'])){
	echo "To finalise your order <a href=checkout.php> Checkout </a>";
}else{
echo "New AshCakes Customer? <a href=register.php> Register Now </a>";
echo "</br>";
echo "Registered AshCakes Member <a href=login.php> Login </a>";
}

//include head layout
include("footlayout.html");
?>